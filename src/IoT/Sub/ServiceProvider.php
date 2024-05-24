<?php

namespace Sudoim\CTWing\IoT\Sub;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['sub'] = function ($app) {
            return new Client($app);
        };
    }
}