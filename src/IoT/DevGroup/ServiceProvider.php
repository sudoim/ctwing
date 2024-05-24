<?php

namespace Sudoim\CTWing\IoT\DevGroup;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['devGroup'] = function ($app) {
            return new Client($app);
        };
    }
}