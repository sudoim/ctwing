<?php

namespace Sudoim\CTWing\IoT\Northbound\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class CreateFirmwareUpgradeTask extends BaseAction
{
    protected string $uri = '/iodm/northbound/%s/operations/firmwareUpgrade';

    public function setFileId(string $fileId): self
    {
        return $this->setBody('fileId', $fileId);
    }

    public function setTargets(array $targets): self
    {
        return $this->setBody('targets', $targets);
    }

    public function setPolicy(array $policy): self
    {
        return $this->setBody('policy', $policy);
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
                    $this->getApiVersion('1.5.0')
                ),
                [],
                $this->getBody()
            );
    }
}