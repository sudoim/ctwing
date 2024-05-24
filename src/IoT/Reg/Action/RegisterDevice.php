<?php

namespace Sudoim\CTWing\IoT\Reg\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class RegisterDevice extends BaseAction
{
    protected string $uri = '/iocm/app/reg/%s/deviceCredentials';

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

    public function setEndUserId(string $endUserId): self
    {
        return $this->setBody('endUserId', $endUserId);
    }

    public function setPsk(string $psk): self
    {
        return $this->setBody('psk', $psk);
    }

    public function setTimeout(string|int $timeout): self
    {
        return $this->setBody('timeout', (int) $timeout);
    }

    public function setIsSecure(bool $isSecure): self
    {
        return $this->setBody('isSecure', $isSecure);
    }

    /**
     * @throws InvalidConfigException
     */
    public function send()
    {
        return $this->client
            ->httpPost(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.0.0')
                ),
                $this->getQuery(),
                $this->getBody()
            );
    }
}