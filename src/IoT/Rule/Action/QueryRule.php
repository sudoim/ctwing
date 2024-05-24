<?php

namespace Sudoim\CTWing\IoT\Rule\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class QueryRule extends BaseAction
{
    protected string $uri = '/iocm/app/rule/%s/rules';

    public function setAppKey(string $appKey): self
    {
        return $this->setHeader('app_key', $appKey);
    }

    public function setAuthorization(string $authorization): self
    {
        return $this->setHeader('Authorization', $authorization);
    }

    public function setAuthor(string $author): self
    {
        return $this->setQuery('author', $author);
    }

    public function setName(string $name): self
    {
        return $this->setQuery('name', $name);
    }

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setSelect(string $select): self
    {
        return $this->setQuery('select', $select);
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
                $this->getQuery(),
                $this->getHeaders()
            );
    }
}