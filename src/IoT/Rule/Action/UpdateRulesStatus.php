<?php

namespace Sudoim\CTWing\IoT\Rule\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class UpdateRulesStatus extends BaseAction
{
    protected string $uri = '/iocm/app/rule/%s/rules/status';

    public function setAppKey(string $appKey): self
    {
        return $this->setHeader('app_key', $appKey);
    }

    public function setAuthorization(string $authorization): self
    {
        return $this->setHeader('Authorization', $authorization);
    }

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setRequests(array $requests): self
    {
        return $this->setBody('requests', $requests);
    }

    /**
     * @throws InvalidConfigException
     */
    public function send()
    {
        return $this->client
            ->httpPut(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.2.0')
                ),
                $this->getQuery(),
                $this->getBody(),
                $this->getHeaders()
            );
    }
}