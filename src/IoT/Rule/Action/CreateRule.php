<?php

namespace Sudoim\CTWing\IoT\Rule\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class CreateRule extends BaseAction
{
    protected string $uri = '/iocm/app/rule/%s/rules';

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setRuleId(string $ruleId): self
    {
        return $this->setBody('ruleId', $ruleId);
    }

    public function setAppKey(string $appKey): self
    {
        return $this->setBody('appKey', $appKey);
    }

    public function setName(string $name): self
    {
        return $this->setBody('name', $name);
    }

    public function setDescription(string $description): self
    {
        return $this->setBody('description', $description);
    }

    public function setAuthor(string $author): self
    {
        return $this->setBody('author', $author);
    }

    public function setConditions(array $conditions): self
    {
        return $this->setBody('conditions', $conditions);
    }

    public function setLogic(string $logic): self
    {
        return $this->setBody('logic', $logic);
    }

    public function setTimeRange(array $timeRange): self
    {
        return $this->setBody('timeRange', $timeRange);
    }

    public function setActions(array $actions): self
    {
        return $this->setBody('actions', $actions);
    }

    public function setMatchNow(string $matchNow): self
    {
        return $this->setBody('matchNow', $matchNow);
    }

    public function setStatus(string $status): self
    {
        return $this->setBody('status', $status);
    }

    public function setGroupExpress(array $groupExpress): self
    {
        return $this->setBody('groupExpress', $groupExpress);
    }

    public function setTimezoneId(string $timezoneId): self
    {
        return $this->setBody('timezoneId', $timezoneId);
    }

    public function setTriggerSources(array $triggerSources): self
    {
        return $this->setBody('triggerSources', $triggerSources);
    }

    public function setExecutor(string $executor): self
    {
        return $this->setBody('executor', $executor);
    }

    public function setTransDate(array $transDate): self
    {
        return $this->setBody('transDate', $transDate);
    }

    public function setRefreshId(bool $refreshId): self
    {
        return $this->setBody('refreshId', $refreshId);
    }

    public function setCheckNullAction(bool $checkNullAction): self
    {
        return $this->setBody('checkNullAction', $checkNullAction);
    }

    public function setPriority(string $priority): self
    {
        return $this->setBody('priority', $priority);
    }

    public function setTags(array $tags): self
    {
        return $this->setBody('tags', $tags);
    }

    public function setRulePreProcessors(array $rulePreProcessors): self
    {
        return $this->setBody('rulePreProcessors', $rulePreProcessors);
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
                    $this->getApiVersion('1.2.0')
                ),
                $this->getQuery(),
                $this->getBody()
            );
    }
}