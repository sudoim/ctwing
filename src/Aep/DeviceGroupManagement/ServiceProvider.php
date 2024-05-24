<?php

namespace Sudoim\CTWing\Aep\DeviceGroupManagement;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['deviceGroupManagement'] = function ($app) {
            return new Client($app);
        };
    }
}