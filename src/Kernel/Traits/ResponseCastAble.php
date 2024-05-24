<?php

namespace Sudoim\CTWing\Kernel\Traits;

use Psr\Http\Message\ResponseInterface;
use Sudoim\CTWing\Kernel\Contracts\ArrayAble;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;
use Sudoim\CTWing\Kernel\Http\Response;
use Sudoim\CTWing\Kernel\Support\Collection;

trait ResponseCastAble
{
    /**
     * @throws InvalidConfigException
     */
    protected function castResponseToType(ResponseInterface $response, $type = null): mixed
    {
        $response = Response::buildFromPsrResponse($response);
        $response->getBody()->rewind();

        $type = !is_null($type) ? $type : 'array';

        switch ($type) {
            case 'collection':
                return $response->toCollection();
            case 'array':
                return $response->toArray();
            case 'object':
                return $response->toObject();
            case 'raw':
                return $response;
            default:
                if (!is_subclass_of($type, ArrayAble::class)) {
                    throw new InvalidConfigException(sprintf('Config key "response_type" classname must be an instanceof %s', ArrayAble::class));
                }

                return new $type($response);
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     */
    protected function detectAndCastResponseToType($response, $type = null)
    {
        switch (true) {
            case $response instanceof ResponseInterface:
                $response = Response::buildFromPsrResponse($response);

                break;
            case $response instanceof ArrayAble:
                $response = new Response(200, [], json_encode($response->toArray()));

                break;
            case ($response instanceof Collection) || is_array($response) || is_object($response):
                $response = new Response(200, [], json_encode($response));

                break;
            case is_scalar($response):
                $response = new Response(200, [], (string) $response);

                break;
            default:
                throw new InvalidArgumentException(sprintf('Unsupported response type "%s"', gettype($response)));
        }

        return $this->castResponseToType($response, $type);
    }
}