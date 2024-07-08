<?php

namespace Sudoim\CTWing\Kernel;

use GuzzleHttp\Client;
use Pimple\Container;
use Sudoim\CTWing\Kernel\Providers\ConfigServiceProvider;
use Sudoim\CTWing\Kernel\Providers\LogServiceProvider;
use Sudoim\CTWing\Kernel\Providers\HttpServiceProvider;

/**
 * @property Config $config
 * @property Client $http_client
 */
class ServiceContainer extends Container
{
    protected array $providers = [];

    protected array $defaultProviders = [
        ConfigServiceProvider::class,
        LogServiceProvider::class,
        HttpServiceProvider::class
    ];

    protected array $defaultConfig = [];

    protected array $userConfig = [];

    public function __construct(array $config = [], array $prepends = [])
    {
        parent::__construct($prepends);

        $this->userConfig = $config;

        $this->registerProviders($this->getProviders());
    }

    public function getConfig(): array
    {
        return array_replace_recursive($this->defaultConfig, $this->userConfig);
    }
    
    public function getProviders(): array
    {
        return array_merge($this->defaultProviders, $this->providers);
    }
    
    public function registerProviders(array $providers): void
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }

    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }
}