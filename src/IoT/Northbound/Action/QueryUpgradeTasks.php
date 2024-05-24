<?php

namespace Sudoim\CTWing\IoT\Northbound\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryUpgradeTasks extends BaseAction
{
    protected string $uri = '/iodm/northbound/%s/operations';

    public function setOperationType(string $operationType): self
    {
        return $this->setQuery('operationType', $operationType);
    }

    public function setOperationStatus(string $operationStatus): self
    {
        return $this->setQuery('operationStatus', $operationStatus);
    }

    public function setDeviceType(string $deviceType): self
    {
        return $this->setQuery('deviceType', $deviceType);
    }

    public function setModel(string $model): self
    {
        return $this->setQuery('model', $model);
    }

    public function setManufacturerName(string $manufacturerName): self
    {
        return $this->setQuery('manufacturerName', $manufacturerName);
    }

    public function setDeviceId(string $deviceId): self
    {
        return $this->setQuery('deviceId', $deviceId);
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
                    $this->getApiVersion('1.5.0')
                ),
                $this->getQuery()
            );
    }
}