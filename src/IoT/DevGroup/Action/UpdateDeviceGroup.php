<?php

namespace Sudoim\CTWing\IoT\DevGroup\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class UpdateDeviceGroup extends BaseAction
{
    protected string $uri = '/iocm/app/devgroup/%s/devGroups/%s';

    protected string $devGroupId = '';

    public function setDevGroupId(string $devGroupId): self
    {
        $this->devGroupId = $devGroupId;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function getDevGroupId(): string
    {
        if (empty($this->devGroupId)) {
            throw new InvalidArgumentException('\'devGroupId\' is required');
        }

        return $this->devGroupId;
    }

    public function setAccessAppId(string $accessAppId): self
    {
        return $this->setQuery('accessAppId', $accessAppId);
    }

    public function setName(string $name): self
    {
        return $this->setBody('name', $name);
    }

    public function setDescription(string $description): self
    {
        return $this->setBody('description', $description);
    }

    public function setMaxDevNum(string $maxDevNum): self
    {
        return $this->setBody('maxDevNum', $maxDevNum);
    }

    /**
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     */
    public function send()
    {
        return $this->client
            ->httpPut(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.3.0'),
                    $this->getDevGroupId()
                ),
                $this->getQuery(),
                $this->getBody()
            );
    }
}