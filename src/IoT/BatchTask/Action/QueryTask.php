<?php

namespace Sudoim\CTWing\IoT\BatchTask\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryTask extends BaseAction
{
    protected string $uri = '/iocm/app/batchtask/%s/tasks/%s';

    protected string $taskId = '';

    public function setTaskId(string $taskId): self
    {
        $this->taskId = $taskId;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function getTaskId(): string
    {
        if (empty($this->taskId)) {
            throw new InvalidArgumentException('\'taskId\' is required');
        }

        return $this->taskId;
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
                    $this->getApiVersion('1.1.0'),
                    $this->getTaskId()
                ),
                $this->getQuery()
            );
    }
}