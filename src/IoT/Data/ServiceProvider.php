<?php

namespace Sudoim\CTWing\IoT\Data;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['data'] = function ($app) {
            return new Client($app);
        };
    }
}