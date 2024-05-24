<?php

namespace Sudoim\CTWing\IoT\Sub\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class SubscribeBusinessData extends BaseAction
{
    protected string $uri = '/iocm/app/sub/%s/subscriptions';

    public function setNotifyType(string $notifyType): self
    {
        return $this->setBody('notifyType', $notifyType);
    }

    public function setCallbackUrl(string $callbackUrl): self
    {
        return $this->setBody('callbackUrl', $callbackUrl);
    }

    public function setAppId(string $appId): self
    {
        return $this->setBody('appId', $appId);
    }

    public function setOwnerFlag(bool $ownerFlag): self
    {
        return $this->setQuery('ownerFlag', $ownerFlag);
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