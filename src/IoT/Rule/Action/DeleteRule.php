<?php

namespace Sudoim\CTWing\IoT\Rule\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class DeleteRule extends BaseAction
{
    protected string $uri = '/iocm/app/rule/%s/rules/%s';

    protected string $ruleId = '';

    public function setRuleId(string $ruleId): self
    {
        $this->ruleId = $ruleId;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function getRuleId(): string
    {
        if (empty($this->ruleId)) {
            throw new InvalidArgumentException('\'ruleId\' is required');
        }

        return $this->ruleId;
    }

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setAppKey(string $appKey): self
    {
        return $this->setHeader('app_key', $appKey);
    }

    public function setAuthorization(string $authorization): self
    {
        return $this->setHeader('Authorization', $authorization);
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
                    $this->getApiVersion('1.2.0'),
                    $this->getRuleId()
                ),
                $this->getQuery(),
                $this->getHeaders()
            );
    }
}