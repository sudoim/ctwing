<?php

namespace Sudoim\CTWing\IoT\Sub\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class DeleteSubscriptions extends BaseAction
{
    protected string $uri = '/iocm/app/sub/%s/subscriptions';

    public function setAppId(string $appId): self
    {
        return $this->setQuery('appId', $appId);
    }

    public function setNotifyType(string $notifyType): self
    {
        return $this->setQuery('notifyType', $notifyType);
    }

    public function setCallbackUrl(string $callbackUrl): self
    {
        return $this->setQuery('callbackUrl', $callbackUrl);
    }

    public function setChannel(string $channel): self
    {
        return $this->setQuery('channel', $channel);
    }
    
    /**
     * @throws InvalidConfigException
     */
    public function send()
    {
        return $this->client
            ->httpDelete(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.2.0')
                ),
                $this->getQuery()
            );
    }
}