<?php

namespace Sudoim\CTWing\IoT;

use Sudoim\CTWing\IoT\Sec\AccessToken;
use Sudoim\CTWing\Kernel\ServiceContainer;

/**
 * @property AccessToken $accessToken
 * @property Reg\Client $reg
 * @property Dm\Client $dm
 * @property BatchTask\Client $batchTask
 * @property Rule\Client $rule
 * @property Sub\Client $sub
 * @property Cmd\Client $cmd
 * @property Data\Client $data
 * @property DevGroup\Client $devGroup
 * @property Northbound\Client $northbound
 */
class Application extends ServiceContainer
{
    protected array $providers = [
        Sec\ServiceProvider::class,
        Reg\ServiceProvider::class,
        Dm\ServiceProvider::class,
        BatchTask\ServiceProvider::class,
        Rule\ServiceProvider::class,
        Sub\ServiceProvider::class,
        Cmd\ServiceProvider::class,
        Data\ServiceProvider::class,
        DevGroup\ServiceProvider::class,
        Northbound\ServiceProvider::class
    ];

    protected array $defaultConfig = [
        'http' => [
            'timeout'  => 10,
            'base_uri' => 'https://device.api.ct10649.com:8743/',
            'verify' => false
        ]
    ];

    public function getConfig(): array
    {
        return array_replace_recursive($this->defaultConfig, $this->userConfig);
    }
}