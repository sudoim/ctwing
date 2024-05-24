<?php

namespace Sudoim\CTWing\IoT\Rule\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class UpdateRuleStatus extends BaseAction
{
    protected string $uri = '/iocm/app/rule/%s/rules/%s/status/%s';

    protected string $ruleId = '';

    protected string $status = '';

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

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function getStatus(): string
    {
        if (empty($this->status)) {
            throw new InvalidArgumentException('\'status\' is required');
        }

        return $this->status;
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
            ->httpPut(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.2.0'),
                    $this->getRuleId(),
                    $this->getStatus()
                ),
                $this->getQuery(),
                [],
                $this->getHeaders()
            );
    }
}