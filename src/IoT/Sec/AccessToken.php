<?php

namespace Sudoim\CTWing\IoT\Sec;

use Sudoim\CTWing\IoT\Kernel\AccessToken as BaseAccessToken;

class AccessToken extends BaseAccessToken
{
    protected string $endpointToGetToken = 'iocm/app/sec/v1.1.0/login';

    protected function getCredentials(): array
    {
        return [
            'appId'  => $this->app['config']['app_key'],
            'secret' => $this->app['config']['app_secret']
        ];
    }
}