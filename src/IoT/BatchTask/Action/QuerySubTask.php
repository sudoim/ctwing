<?php

namespace Sudoim\CTWing\IoT\BatchTask\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QuerySubTask extends BaseAction
{
    protected string $uri = '/iocm/app/batchtask/%s/taskDetails';

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setTaskId(string $taskId): self
    {
        return $this->setQuery('taskId', $taskId);
    }

    public function setStatus(string $status): self
    {
        return $this->setQuery('status', $status);
    }

    public function setDeviceId(string $deviceId): self
    {
        return $this->setQuery('deviceId', $deviceId);
    }

    public function setCommandId(string $commandId): self
    {
        return $this->setQuery('commandId', $commandId);
    }

    public function setPageNo(string|int $pageNo): self
    {
        return $this->setQuery('pageNo', (int) $pageNo);
    }

    public function setPageSize(string|int $pageSize): self
    {
        return $this->setQuery('pageSize', (int) $pageSize);
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