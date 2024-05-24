<?php

namespace Sudoim\CTWing\IoT\Dm\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryDevice extends BaseAction
{
    protected string $uri = '/iocm/app/dm/%s/devices/%s';

    protected string $deviceId = '';

    public function setDeviceId(string $deviceId): self
    {
        $this->deviceId = $deviceId;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function getDeviceId(): string
    {
        if (empty($this->deviceId)) {
            throw new InvalidArgumentException('\'deviceId\' is required');
        }

        return $this->deviceId;
    }

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setSelect(string $select): self
    {
        return $this->setQuery('select', $select);
    }

    /**
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     */
    public function send()
    {
        return $this->client
            ->httpGet(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.4.0'),
                    $this->getDeviceId()
                ),
                $this->getQuery()
            );
    }
}