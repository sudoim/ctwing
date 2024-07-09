<?php

namespace Sudoim\CTWing\IoT\Kernel;

use Closure;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LogLevel;
use ReflectionClass;
use Psr\Http\Message\RequestInterface;
use Sudoim\CTWing\Kernel\Contracts\AccessTokenInterface;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;
use Sudoim\CTWing\Kernel\Http\Response;
use Sudoim\CTWing\Kernel\Traits\HasHttpRequests;
use Sudoim\CTWing\Kernel\ServiceContainer;

class BaseClient
{
    use HasHttpRequests {
        request as performRequest;
    }

    protected ServiceContainer $app;

    protected AccessTokenInterface|null $accessToken = null;

    protected string|null $baseUri = null;

    public function __construct(ServiceContainer $app, AccessTokenInterface $accessToken = null)
    {
        $this->app = $app;
        $this->accessToken = $accessToken ?? $this->app['access_token'];
    }

    /**
     * @throws InvalidConfigException
     */
    public function httpGet(string $url, array $query = [], array $headers = [])
    {
        return $this->request($url, 'GET', ['query' => $query, 'headers' => $headers]);
    }

    /**
     * @throws InvalidConfigException
     */
    public function httpPost(string $url, array $query = [], array $params = [], array $headers = [])
    {
        return $this->request($url, 'POST', ['query' => $query, 'json' => $params, 'headers' => $headers]);
    }

    /**
     * @throws InvalidConfigException
     */
    public function httpPut(string $url, array $query = [], array $params = [], array $headers = [])
    {
        return $this->request($url, 'PUT', ['query' => $query, 'json' => $params, 'headers' => $headers]);
    }

    /**
     * @throws InvalidConfigException
     */
    public function httpDelete(string $url, array $query = [], array $headers = [])
    {
        return $this->request($url, 'DELETE', ['query' => $query, 'headers' => $headers]);
    }

    /**
     * @throws InvalidConfigException
     */
    public function request(string $url, string $method = 'GET', array $options = [], bool $returnRaw = false)
    {
        if (empty($this->middlewares)) {
            $this->registerHttpMiddlewares();
        }

        $response = $this->performRequest($url, $method, $options);

        return $returnRaw
            ? $response
            : $this->castResponseToType($response, $this->app->config->get('response_type'));
    }

    /**
     * @throws InvalidConfigException
     */
    public function requestRaw(string $url, string $method = 'GET', array $options = []): Response
    {
        return Response::buildFromPsrResponse($this->request($url, $method, $options, true));
    }

    protected function registerHttpMiddlewares(): void
    {
        $this->pushMiddleware($this->retryMiddleware(), 'retry');
        $this->pushMiddleware($this->accessTokenMiddleware(), 'access_token');
        $this->pushMiddleware($this->logMiddleware(), 'log');
    }

    protected function retryMiddleware(): Closure
    {
        return Middleware::retry(
            function (
                $retries,
                RequestInterface $request,
                ResponseInterface $response = null
            ) {
                // Limit the number of retries to 2
                if ($retries < $this->app->config->get('http.max_retries', 1) && $response && $body = $response->getBody()) {
                    // Retry on server errors
                    $response = json_decode($body, true);

                    if (!empty($response['resultcode']) && abs($response['resultcode']) === 1010005) {
                        $this->accessToken->refresh();
                        $this->app['logger']->debug('Retrying with refreshed access token.');

                        return true;
                    }
                }

                return false;
            },
            function () {
                return abs($this->app->config->get('http.retry_delay', 500));
            }
        );
    }

    protected function accessTokenMiddleware(): Closure
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                if ($this->accessToken) {
                    $request = $this->accessToken->applyToRequest($request, $options);
                }

                return $handler($request, $options);
            };
        };
    }

    protected function logMiddleware(): Closure
    {
        $formatter = new MessageFormatter($this->app['config']['http.log_template'] ?? MessageFormatter::DEBUG);

        return Middleware::log($this->app['logger'], $formatter, LogLevel::DEBUG);
    }

    public function __get(string $name)
    {
        $namespace = (new ReflectionClass(static::class))->getNamespaceName();

        $action = $namespace . '\\Action\\' . ucfirst($name);

        return new $action($this);
    }
}