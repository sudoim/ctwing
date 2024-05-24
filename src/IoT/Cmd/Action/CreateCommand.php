<?php

namespace Sudoim\CTWing\IoT\Cmd\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class CreateCommand extends BaseAction
{
    protected string $uri = '/iocm/app/cmd/%s/deviceCommands';

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setDeviceId(string $deviceId): self
    {
        return $this->setBody('deviceId', $deviceId);
    }

    public function setCommand(array $command): self
    {
        return $this->setBody('command', $command);
    }

    public function setCallbackUrl(string $callbackUrl): self
    {
        return $this->setBody('callbackUrl', $callbackUrl);
    }

    public function setExpireTime(string|int $expireTime): self
    {
        return $this->setBody('expireTime', (int) $expireTime);
    }

    public function setMaxRetransmit(string|int $maxRetransmit): self
    {
        return $this->setBody('maxRetransmit', (int) $maxRetransmit);
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
                    $this->getApiVersion('1.4.0')
                ),
                $this->getQuery(),
                $this->getBody()
            );
    }
}