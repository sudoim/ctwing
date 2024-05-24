<?php

namespace Sudoim\CTWing\IoT\Northbound\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryVersionPackages extends BaseAction
{
    protected string $uri = '/iodm/northbound/%s/category';

    public function setFileType(string $fileType): self
    {
        return $this->setQuery('fileType', $fileType);
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

    public function setVersion(string $version): self
    {
        return $this->setQuery('version', $version);
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