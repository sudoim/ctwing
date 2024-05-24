<?php

namespace Sudoim\CTWing\IoT\BatchTask\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class CreateTasks extends BaseAction
{
    protected string $uri = '/iocm/app/batchtask/%s/tasks';

    public function setAppId(string $appId): self
    {
        return $this->setBody('appId', $appId);
    }

    public function setTimeout(string|int $timeout): self
    {
        return $this->setBody('timeout', (int) $timeout);
    }

    public function setTaskName(string $taskName): self
    {
        return $this->setBody('taskName', $taskName);
    }

    public function setTaskType(string $taskType): self
    {
        return $this->setBody('taskType', $taskType);
    }

    public function setParam(array $param): self
    {
        return $this->setBody('param', $param);
    }

    public function setTags(array $tags): self
    {
        return $this->setBody('tags', $tags);
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
                    $this->getApiVersion('1.1.0')
                ),
                [],
                $this->getBody()
            );
    }
}