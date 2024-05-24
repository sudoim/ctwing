<?php

namespace Sudoim\CTWing\IoT\Dm\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class DeleteDevice extends BaseAction
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

    /**
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     */
    public function send()
    {
        return $this->client
            ->httpDelete(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.4.0'),
                    $this->getDeviceId()
                ),
                $this->getQuery()
            );
    }
}