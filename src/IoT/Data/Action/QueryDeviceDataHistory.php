<?php

namespace Sudoim\CTWing\IoT\Data\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryDeviceDataHistory extends BaseAction
{
    protected string $uri = '/iocm/app/data/%s/deviceDataHistory';

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setDeviceId(string $deviceId): self
    {
        return $this->setQuery('deviceId', $deviceId);
    }

    public function setGatewayId(string $gatewayId): self
    {
        return $this->setQuery('gatewayId', $gatewayId);
    }

    public function setServiceId(string $serviceId): self
    {
        return $this->setQuery('serviceId', $serviceId);
    }

    public function setProperty(string $property): self
    {
        return $this->setQuery('property', $property);
    }

    public function setPageNo(string|int $pageNo): self
    {
        return $this->setQuery('pageNo', (int) $pageNo);
    }

    public function setPageSize(string|int $pageSize): self
    {
        return $this->setQuery('pageSize', (int) $pageSize);
    }

    public function setStartTime(string $startTime): self
    {
        return $this->setQuery('startTime', $startTime);
    }

    public function setEndTime(string $endTime): self
    {
        return $this->setQuery('endTime', $endTime);
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
                    $this->getApiVersion('1.2.0')
                ),
                $this->getQuery()
            );
    }
}