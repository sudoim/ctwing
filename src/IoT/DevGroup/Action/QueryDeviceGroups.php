<?php

namespace Sudoim\CTWing\IoT\DevGroup\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryDeviceGroups extends BaseAction
{
    protected string $uri = '/iocm/app/devgroup/%s/devGroups';

    public function setAccessAppId(string $accessAppId): self
    {
        return $this->setQuery('accessAppId', $accessAppId);
    }

    public function setPageNo(string|int $pageNo): self
    {
        return $this->setQuery('pageNo', (int) $pageNo);
    }

    public function setPageSize(string|int $pageSize): self
    {
        return $this->setQuery('pageSize', (int) $pageSize);
    }

    public function setName(string $name): self
    {
        return $this->setQuery('name', $name);
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
                    $this->getApiVersion('1.3.0')
                ),
                $this->getQuery()
            );
    }
}