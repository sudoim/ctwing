<?php

namespace Sudoim\CTWing\IoT\Northbound\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryUpgradeSubTasks extends BaseAction
{
    protected string $uri = '/iodm/northbound/%s/operations/%s/subOperations';

    protected string $operationId = '';

    public function setOperationId(string $operationId): self
    {
        $this->operationId = $operationId;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function getOperationId(): string
    {
        if (empty($this->operationId)) {
            throw new InvalidArgumentException('\'operationId\' is required');
        }

        return $this->operationId;
    }

    public function setSubOperationStatus(string $subOperationStatus): self
    {
        return $this->setQuery('subOperationStatus', $subOperationStatus);
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
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     */
    public function send()
    {
        return $this->client
            ->httpGet(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.5.0'),
                    $this->getOperationId()
                ),
                $this->getQuery()
            );
    }
}