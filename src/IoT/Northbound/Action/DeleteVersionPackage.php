<?php

namespace Sudoim\CTWing\IoT\Northbound\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class DeleteVersionPackage extends BaseAction
{
    protected string $uri = '/iodm/northbound/%s/category/%s';

    protected string $fileId = '';

    public function setFileId(string $fileId): self
    {
        $this->fileId = $fileId;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function getFileId(): string
    {
        if (empty($this->fileId)) {
            throw new InvalidArgumentException('\'fileId\' is required');
        }

        return $this->fileId;
    }

    /**
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     */
    public function send()
    {
        return $this->client
            ->httpDelete(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.5.0'),
                    $this->getFileId()
                )
            );
    }
}