<?php

namespace Sudoim\CTWing\IoT\Cmd\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class UpdateCommand extends BaseAction
{
    protected string $uri = '/iocm/app/cmd/%s/deviceCommands/%s';

    protected string $commandId = '';

    public function setCommandId(string $commandId): self
    {
        $this->commandId = $commandId;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function getCommandId(): string
    {
        if (empty($this->commandId)) {
            throw new InvalidArgumentException('\'commandId\' is required');
        }

        return $this->commandId;
    }

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setStatus(string $status): self
    {
        return $this->setBody('status', $status);
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
                    $this->getApiVersion('1.4.0'),
                    $this->getCommandId()
                ),
                $this->getQuery()
            );
    }
}