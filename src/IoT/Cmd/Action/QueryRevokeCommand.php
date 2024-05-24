<?php

namespace Sudoim\CTWing\IoT\Cmd\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryRevokeCommand extends BaseAction
{
    protected string $uri = '/iocm/app/cmd/%s/deviceCommandCancelTasks';

    public function setPageNo(string|int $pageNo): self
    {
        return $this->setQuery('pageNo', (int) $pageNo);
    }

    public function setPageSize(string|int $pageSize): self
    {
        return $this->setQuery('pageSize', (int) $pageSize);
    }

    public function setTaskId(string $taskId): self
    {
        return $this->setQuery('taskId', $taskId);
    }

    public function setDeviceId(string $deviceId): self
    {
        return $this->setQuery('deviceId', $deviceId);
    }

    public function setStatus(string $status): self
    {
        return $this->setQuery('status', $status);
    }

    public function setStartTime(string $startTime): self
    {
        return $this->setQuery('startTime', $startTime);
    }

    public function setEndTime(string $endTime): self
    {
        return $this->setQuery('endTime', $endTime);
    }

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
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
                    $this->getApiVersion('1.4.0')
                ),
                $this->getQuery()
            );
    }
}