<?php

namespace Sudoim\CTWing\IoT\Northbound;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['northBound'] = function ($app) {
            return new Client($app);
        };
    }
}