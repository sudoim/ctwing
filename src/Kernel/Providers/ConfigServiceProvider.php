<?php

namespace Sudoim\CTWing\Kernel\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Sudoim\CTWing\Kernel\Config;

class ConfigServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        !isset($pimple['config']) && $pimple['config'] = function ($app) {
            return new Config($app->getConfig());
        };
    }
}