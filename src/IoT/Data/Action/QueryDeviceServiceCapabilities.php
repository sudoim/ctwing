<?php

namespace Sudoim\CTWing\IoT\Data\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryDeviceServiceCapabilities extends BaseAction
{
    protected string $uri = '/iocm/app/data/%s/deviceCapabilities';

    public function setGatewayId(string $gatewayId): self
    {
        return $this->setQuery('gatewayId', $gatewayId);
    }

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setDeviceId(string $deviceId): self
    {
        return $this->setQuery('deviceId', $deviceId);
    }

    /**
     * @throws InvalidConfigException
     */
    public function send()
    {
        return $this->client
            ->httpGet(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.1.0')
                ),
                $this->getQuery()
            );
    }
}