<?php

namespace Sudoim\CTWing\IoT\Sub\Action;

use Sudoim\CTWing\IoT\Kernel\BaseAction;
use Sudoim\CTWing\Kernel\Exceptions\InvalidConfigException;

class SubscribeManagementData extends BaseAction
{
    protected string $uri = '/iodm/app/sub/%s/subscribe';

    public function setNotifyType(string $notifyType): self
    {
        return $this->setBody('notifyType', $notifyType);
    }

    public function setCallbackUrl(string $callbackUrl): self
    {
        return $this->setbody('callbackUrl', $callbackUrl);
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
                    $this->getApiVersion('1.1.0')
                ),
                [],
                $this->getBody()
            );
    }
}