<?php

namespace Sudoim\CTWing\Aep\Kernel;

use Closure;
use Psr\Http\Message\RequestInterface;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;
use Sudoim\CTWing\Kernel\Http\Response;
use Sudoim\CTWing\Kernel\Http\StreamResponse;
use Sudoim\CTWing\Kernel\Traits\HasHttpRequests;
use Sudoim\CTWing\Kernel\ServiceContainer;

class BaseClient
{
    use HasHttpRequests {
        request as performRequest;
    }

    protected ServiceContainer $app;

    protected string|null $baseUri = null;

    protected string $path = '';

    protected bool $withTimestamp = true;

    protected bool $needSignature = true;

    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;
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
    public function httpPost(string $url, array $params = [], array $headers = [])
    {
        return $this->request($url, 'POST', ['form_params' => $params, 'headers' => $headers]);
    }

    /**
     * @throws InvalidConfigException
     */
    public function httpPut(string $url, array $query = [], array $params = [], array $headers = [])
    {
        return $this->request($url, 'PUT', ['form_params' => $params, 'query' => $query, 'headers' => $headers]);
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
    public function httpPostJson(string $url, array $params = [], array $headers = [])
    {
        return $this->request($url, 'POST', ['json' => $params, 'headers' => $headers]);
    }

    /**
     * @throws InvalidConfigException
     */
    public function httpPutJson(string $url, array $query = [], array $params = [], array $headers = [])
    {
        return $this->request($url, 'PUT', ['json' => $params, 'query' => $query, 'headers' => $headers]);
    }

    /**
     * @throws InvalidConfigException
     */
    public function httpGetStream(string $url, $method = 'GET', array $params = [], array $headers = [])
    {
        $options = ('GET' == strtoupper($method))
            ? ['query' => $params]
            : ['form_params' => $params];

        $options['headers'] = $headers;

        $response = $this->request($url, $method, $options, true);

        if (false !== stripos($response->getHeaderLine('Content-Type'), 'image')) {
            return StreamResponse::buildFromPsrResponse($response);
        }

        return $this->castResponseToType($response, $this->app->config->get('response_type'));
    }

    /**
     * @throws InvalidConfigException
     */
    public function request(string $url, string $method = 'GET', array $options = [], bool $returnRaw = false)
    {
        if (empty($this->middlewares)) {
            $this->registerHttpMiddlewares();
        }

        $response = $this->performRequest($this->path . $url, $method, $options);

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
        if ($this->withTimestamp) {
            $this->pushMiddleware($this->timestampMiddleware(), 'timestamp');
        }

        if ($this->needSignature) {
            $this->pushMiddleware($this->signatureMiddleware(), 'signature');
        }
    }

    protected function timestampMiddleware(): Closure
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                $request = $this->app->timestamp->applyTimestampToRequest($request);

                return $handler($request, $options);
            };
        };
    }

    protected function signatureMiddleware(): Closure
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                $request = $this->app->signature->applySignatureToRequest($request);

                return $handler($request, $options);
            };
        };
    }
}