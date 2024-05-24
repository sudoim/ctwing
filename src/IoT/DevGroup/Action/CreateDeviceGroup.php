<?php

namespace Sudoim\CTWing\IoT\DevGroup\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class CreateDeviceGroup extends BaseAction
{
    protected string $uri = '/iocm/app/devgroup/%s/devGroups';

    public function setName(string $name): self
    {
        return $this->setBody('name', $name);
    }

    public function setDescription(string $description): self
    {
        return $this->setBody('description', $description);
    }

    public function setAppId(string $appId): self
    {
        return $this->setBody('appId', $appId);
    }

    public function setMaxDevNum(string|int $maxDevNum): self
    {
        return $this->setBody('maxDevNum', (int) $maxDevNum);
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
                    $this->getApiVersion('1.3.0')
                ),
                [],
                $this->getBody()
            );
    }
}