<?php

namespace Sudoim\CTWing\Kernel\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Sudoim\CTWing\Kernel\Support\Collection;

class HttpException extends Exception
{
    public ResponseInterface|null $response = null;

    public ResponseInterface|Collection|array|string|null $formattedResponse = null;

    public function __construct(string $message = '', ResponseInterface $response = null, $formattedResponse = null, $code = 0)
    {
        parent::__construct($message, $code);

        $this->response = $response;
        $this->formattedResponse = $formattedResponse;

        if ($response) {
            $response->getBody()->rewind();
        }
    }
}