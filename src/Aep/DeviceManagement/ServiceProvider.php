<?php

namespace Sudoim\CTWing\Aep\DeviceManagement;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['deviceManagement'] = function ($app) {
            return new Client($app);
        };
    }
}