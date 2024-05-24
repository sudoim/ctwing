<?php

namespace Sudoim\CTWing\IoT\Sub\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class DeleteSubscription extends BaseAction
{
    protected string $uri = '/iocm/app/sub/%s/subscriptions/%s';

    protected string $subscriptionId = '';

    public function setSubscriptionId(string $subscriptionId): self
    {
        $this->subscriptionId = $subscriptionId;

        return $this;
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function getSubscriptionId(): string
    {
        if (empty($this->subscriptionId)) {
            throw new InvalidArgumentException('\'subscriptionId\' is required');
        }

        return $this->subscriptionId;
    }

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
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
                    $this->getSubscriptionId()
                ),
                $this->getQuery()
            );
    }
}