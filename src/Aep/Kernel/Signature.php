<?php

namespace Sudoim\CTWing\Aep\Kernel;

use Psr\Http\Message\RequestInterface;
use Sudoim\CTWing\Kernel\ServiceContainer;

class Signature
{
    protected string $appKey;

    protected string $appSecret;

    public function __construct(ServiceContainer $app)
    {
        $this->appKey    = $app->config->get('app_key');
        $this->appSecret = $app->config->get('app_secret');
    }

    public function getAppKey()
    {
        return $this->appKey;
    }

    public function setAppKey(string $appKey): void
    {
        $this->appKey = $appKey;
    }

    public function getAppSecret()
    {
        return $this->appSecret;
    }

    public function setAppSecret(string $appSecret): void
    {
        $this->appSecret = $appSecret;
    }

    public function signature(string $appKey, string $appSecret, int $timestamp, array $params, array $body = null): string
    {
        // 2.生成签名
        unset($params['timestamp'], $params['version']);

        // 将业务数据排序
        ksort($params);

        // 写入数据
        $temp = [
            'application' => $appKey,
            'timestamp'   => $timestamp
        ];

        $temp = array_merge($temp, $params);

        $string = '';
        foreach ($temp as $key => $value) {
            $string .= $key . ':' . $value . "\n";
        }

        $bytes = $this->getBytes($string);

        if (!empty($body)) {
            $bytes = array_merge($bytes, $body, $this->getBytes("\n"));
        }

        $text = $this->toStr($bytes);

        return $this->encrypt($text, $appSecret);
    }

    public function getBytes(string|null $string): array
    {
        $bytes = [];

        $length = strlen($string);
        for ($idx = 0; $idx < $length; $idx++) {
            $byte = substr($string, $idx);
            $bytes[] = ord($byte);
        }

        return $bytes;
    }

    public function toStr(array $bytes): string
    {
        $string = '';

        foreach ($bytes as $byte) {
            $string .= chr($byte);
        }

        return $string;
    }

    public function encrypt(string $text, string $key): string
    {
        $hashHmac = hash_hmac('sha1', $text, $key, true);

        return base64_encode($hashHmac);
    }

    public function applySignatureToRequest(RequestInterface $request): RequestInterface
    {
        // 1.调用者
        $headers = $this->getHeaders($request);
        $params  = $this->getParams($request);

        $signature = $this->signature(
            $this->appKey,
            $this->appSecret,
            $request->getHeaderLine('timestamp'),
            array_merge($headers, $params),
            $this->getBytes($this->getParams($request, true))
        );

        return $request
            ->withHeader('application', $this->appKey)
            ->withHeader('signature', $signature);
    }

    public function getParams(RequestInterface $request, bool $isJson = false): array|string
    {
        switch ($request->getMethod()) {
            case 'GET':
                parse_str($request->getUri()->getQuery(), $params);
                break;
            default:
                $params = $isJson ? $request->getBody()->getContents() : [];
                break;
        }

        if ($isJson && is_array($params)) {
            return '';
        }

        return $params;
    }

    public function getHeaders(RequestInterface $request): array
    {
        $headers = array_diff_key($request->getHeaders(), array_flip(['User-Agent', 'Host', 'Content-Type', 'Content-Length', 'Accept']));

        return array_map(function ($value) {
            if (is_array($value) && count($value) === 1) {
                $value = $value[0];
            }

            return $value;
        }, $headers);
    }
}