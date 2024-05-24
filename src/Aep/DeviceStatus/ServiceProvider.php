<?php

namespace Sudoim\CTWing\Aep\DeviceStatus;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['deviceStatus'] = function ($app) {
            return new Client($app);
        };
    }
}