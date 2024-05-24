<?php

namespace Sudoim\CTWing\IoT\DevGroup\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryDeviceGroup extends BaseAction
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
                    $this->getApiVersion('1.3.0'),
                    $this->getDevGroupId()
                ),
                $this->getQuery()
            );
    }
}