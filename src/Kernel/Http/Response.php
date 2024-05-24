<?php

namespace Sudoim\CTWing\Kernel\Http;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Psr\Http\Message\ResponseInterface;
use Sudoim\CTWing\Aep\Kernel\Support\Collection;

class Response extends GuzzleResponse
{
    public function getBodyContents(): string
    {
        $this->getBody()->rewind();

        $content = $this->getBody()->getContents();

        $this->getBody()->rewind();

        return $content;
    }

    public static function buildFromPsrResponse(ResponseInterface $response): Response
    {
        return new static(
            $response->getStatusCode(),
            $response->getHeaders(),
            $response->getBody(),
            $response->getProtocolVersion(),
            $response->getReasonPhrase()
        );
    }
    
    public function toJson(): bool|string
    {
        return json_encode($this->toArray());
    }
    
    public function toArray(): array
    {
        $content = $this->removeControlCharacters($this);

        if (false !== stripos($this->getHeaderLine('Content-Type'), 'xml') || 0 === stripos($content, '<xml')) {
            // todo 抛出不支持xml的异常
            return [];
        }

        $array = json_decode($content, true, 512, JSON_BIGINT_AS_STRING);

        if (JSON_ERROR_NONE === json_last_error()) {
            return (array) $array;
        }

        return [];
    }

    public function toCollection(): Collection
    {
        return new Collection($this->toArray());
    }

    public function toObject(): mixed
    {
        return json_decode($this->toJson());
    }
    
    public function __toString(): string
    {
        return $this->getBodyContents();
    }

    protected function removeControlCharacters(string $content): array|string|null
    {
        return preg_replace('/[\x00-\x1F\x80-\x9F]/u', '', mb_convert_encoding($content, 'UTF-8', 'UTF-8'));
    }
}