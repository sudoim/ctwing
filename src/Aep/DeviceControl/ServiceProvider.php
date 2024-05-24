<?php

namespace Sudoim\CTWing\Aep\DeviceControl;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['deviceControl'] = function ($app) {
            return new Client($app);
        };
    }
}