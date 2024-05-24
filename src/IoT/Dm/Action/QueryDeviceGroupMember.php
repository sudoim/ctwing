<?php

namespace Sudoim\CTWing\IoT\Dm\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryDeviceGroupMember extends BaseAction
{
    protected string $uri = '/iocm/app/dm/%s/devices/ids';

    public function setDevGroupId(string $devGroupId): self
    {
        return $this->setQuery('devGroupId', $devGroupId);
    }

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
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
                    $this->getApiVersion('1.2.0')
                ),
                $this->getQuery()
            );
    }
}