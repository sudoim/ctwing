<?php

namespace Sudoim\CTWing\IoT\Dm\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class AddDeviceGroupMember extends BaseAction
{
    protected string $uri = '/iocm/app/dm/%s/devices/addDevGroupTagToDevices';

    public function setAccessAppId(string $accessAppId): self
    {
        return $this->setQuery('accessAppId', $accessAppId);
    }

    public function setDevGroupId(string $devGroupId): self
    {
        return $this->setBody('devGroupId', $devGroupId);
    }

    public function setDeviceIds(array $deviceIds): self
    {
        return $this->setBody('deviceIds', $deviceIds);
    }

    /**
     * @throws InvalidConfigException
     */
    public function send()
    {
        return $this->client
            ->httpPost(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.1.0')
                ),
                $this->getQuery(),
                $this->getBody()
            );
    }
}