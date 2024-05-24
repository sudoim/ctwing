<?php

namespace Sudoim\CTWing\IoT\Kernel;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Sudoim\CTWing\Kernel\Contracts\AccessTokenInterface;
use Sudoim\CTWing\Kernel\Exceptions\HttpException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;
use Sudoim\CTWing\Kernel\Exceptions\RuntimeException;
use Sudoim\CTWing\Kernel\ServiceContainer;
use Sudoim\CTWing\Kernel\Support\Collection;
use Sudoim\CTWing\Kernel\Traits\HasHttpRequests;
use Sudoim\CTWing\Kernel\Traits\InteractsWithCache;

abstract class AccessToken implements AccessTokenInterface
{
    use HasHttpRequests;

    use InteractsWithCache;

    protected ServiceContainer $app;

    protected string $requestMethod = 'POST';

    protected string $endpointToGetToken;

    protected array $token = [];

    protected string $tokenKey = 'accessToken';

    protected string $cachePrefix = 'ctWing.kernel.access_token.';

    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;
    }

    public function getLastToken(): array
    {
        return $this->token;
    }

    /**
     * @param bool $refresh
     * @return array
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     * @throws RuntimeException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getToken(bool $refresh = false): array
    {
        $cacheKey = $this->getCacheKey();
        $cache = $this->getCache();

        if (!$refresh && $cache->has($cacheKey) && $result = $cache->get($cacheKey)) {
            return $result;
        }

        $token = $this->requestToken($this->getCredentials(), true);

        $this->setToken($token[$this->tokenKey], $token['expiresIn'] ?? 3600);

        $this->token = $token;

        return $token;
    }

    /**
     * @throws RuntimeException
     * @throws InvalidArgumentException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function setToken(string $token, int $lifetime = 3600): AccessTokenInterface
    {
        $this->getCache()->set($this->getCacheKey(), [
            $this->tokenKey => $token,
            'expiresIn' => $lifetime,
        ], $lifetime);

        if (!$this->getCache()->has($this->getCacheKey())) {
            throw new RuntimeException('Failed to cache access token.');
        }

        return $this;
    }

    /**
     * @throws RuntimeException
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws InvalidConfigException
     */
    public function refresh(): AccessTokenInterface
    {
        $this->getToken(true);

        return $this;
    }

    /**
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     */
    public function requestToken(array $credentials, bool $toArray = false): ResponseInterface|Collection|array|string
    {
        $response = $this->sendRequest($credentials);
        $result = json_decode($response->getBody()->getContents(), true);
        $formatted = $this->castResponseToType($response, $this->app['config']->get('response_type'));

        if (empty($result[$this->tokenKey])) {
            throw new HttpException('Request access_token fail: ' . json_decode($result, JSON_UNESCAPED_UNICODE), $response, $formatted);
        }

        return $toArray ? $result : $formatted;
    }

    /**
     * @throws RuntimeException
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws InvalidConfigException
     */
    public function applyToRequest(RequestInterface $request, array $requestOptions = []): RequestInterface
    {
        return $request
            ->withHeader('app_key', $this->app['config']->get('app_key'))
            ->withHeader('Authorization', 'Bearer ' . $this->getToken()[$this->tokenKey]);
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function sendRequest(array $credentials): ResponseInterface
    {
        $options = [
            ('GET' === $this->requestMethod) ? 'query' : 'form_params' => $credentials
        ];

        return $this->setHttpClient($this->app['http_client'])->request($this->getEndpoint(), $this->requestMethod, $options);
    }

    protected function getCacheKey(): string
    {
        return $this->cachePrefix . md5(json_encode($this->getCredentials()));
    }

    /**
     * @throws InvalidArgumentException
     */
    public function getEndpoint(): string
    {
        if (empty($this->endpointToGetToken)) {
            throw new InvalidArgumentException('No endpoint for access token request');
        }

        return $this->endpointToGetToken;
    }

    public function getTokenKey(): string
    {
        return $this->tokenKey;
    }
    
    abstract protected function getCredentials(): array;
}