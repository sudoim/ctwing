<?php

namespace Sudoim\CTWing\IoT\Rule\Action;

class UpdateRule extends CreateRule
{
    protected string $uri = '/iocm/app/rule/%s/rules';

    public function send()
    {
        return $this->client
            ->httpPut(
                sprintf(
                    $this->getUri(),
                    $this->getApiVersion('1.2.0')
                ),
                $this->getQuery(),
                $this->getBody()
            );
    }
}