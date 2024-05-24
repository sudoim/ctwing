<?php

namespace Sudoim\CTWing\IoT\Northbound\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryUpgradeTask extends BaseAction
{
    protected string $uri = '/iodm/northbound/%s/operations/%s';

    protected string $operationId = '';

    public function setOperationId(string $operationId): self
    {
        $this->operationId = $operationId;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function getOperationId(): string
    {
        if (empty($this->operationId)) {
            throw new InvalidArgumentException('\'operationId\' is required');
        }

        return $this->operationId;
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
                    $this->getApiVersion('1.5.0'),
                    $this->getOperationId()
                )
            );
    }
}