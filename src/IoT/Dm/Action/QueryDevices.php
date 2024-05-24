<?php

namespace Sudoim\CTWing\IoT\Dm\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryDevices extends BaseAction
{
    protected string $uri = '/iocm/app/dm/%s/devices';

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setGatewayId(string $gatewayId): self
    {
        return $this->setQuery('gatewayId', $gatewayId);
    }

    public function setNodeType(string $nodeType): self
    {
        return $this->setQuery('nodeType', $nodeType);
    }

    public function setDeviceType(string $deviceType): self
    {
        return $this->setQuery('deviceType', $deviceType);
    }

    public function setPageNo(string|int $pageNo): self
    {
        return $this->setQuery('pageNo', (int) $pageNo);
    }

    public function setPageSize(string|int $pageSize): self
    {
        return $this->setQuery('pageSize', (int) $pageSize);
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

    public function setSort(string $sort): self
    {
        return $this->setQuery('sort', $sort);
    }

    public function setSelect(string $select): self
    {
        return $this->setQuery('select', $select);
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