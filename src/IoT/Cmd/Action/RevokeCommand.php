<?php

namespace Sudoim\CTWing\IoT\Cmd\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class RevokeCommand extends BaseAction
{
    protected string $uri = '/iocm/app/cmd/%s/deviceCommandCancelTasks';

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setDeviceId(string $deviceId): self
    {
        return $this->setBody('deviceId', $deviceId);
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
                $this->getQuery()
            );
    }
}