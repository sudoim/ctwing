<?php

namespace Sudoim\CTWing\IoT\Dm;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['dm'] = function ($app) {
            return new Client($app);
        };
    }
}