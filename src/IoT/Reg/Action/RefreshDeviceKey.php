<?php

namespace Sudoim\CTWing\IoT\Reg\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class RefreshDeviceKey extends BaseAction
{
    protected string $uri = '/iocm/app/reg/%s/deviceCredentials/%s';

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

    public function setVerifyCode(string $verifyCode): self
    {
        return $this->setBody('verifyCode', $verifyCode);
    }

    public function setNodeId(string $nodeId): self
    {
        return $this->setBody('nodeId', $nodeId);
    }

    public function setTimeout(string|int $timeout): self
    {
        return $this->setBody('timeout', (int) $timeout);
    }

    /**
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     */
    public function send()
    {
        return $this->client
            ->httpPut(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.1.0'),
                    $this->getDeviceId()
                ),
                $this->getQuery(),
                $this->getBody()
            );
    }
}