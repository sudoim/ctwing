<?php

namespace Sudoim\CTWing\Aep\Kernel;

use Psr\Http\Message\RequestInterface;
use Sudoim\CTWing\Aep\Timestamp\Client;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;
use Sudoim\CTWing\Kernel\ServiceContainer;

class Timestamp
{
    protected Client $client;

    public function __construct(ServiceContainer $app)
    {
        $this->client = new Client($app);
    }

    /**
     * @throws InvalidConfigException
     */
    public function applyTimestampToRequest(RequestInterface $request): RequestInterface
    {
        return $request->withHeader('timestamp', $this->getTimeOffset());
    }

    /**
     * @throws InvalidConfigException
     */
    public function getTimeOffset(): int
    {
        $start = $this->getMillisecond();

        $timestamp = $this->client->getTimestamp();

        $end = $this->getMillisecond();

        return $this->getMillisecond() + (int) round($timestamp - ($start + $end) / 2);
    }

    public function getMillisecond(): int
    {
        list($micro, $second) = explode(' ', microtime());

        return (int) ((floatval($micro) + floatval($second)) * 1000);
    }
}