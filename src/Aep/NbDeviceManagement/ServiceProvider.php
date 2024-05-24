<?php

namespace Sudoim\CTWing\Aep\NbDeviceManagement;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['nbDeviceManagement'] = function ($app) {
            return new Client($app);
        };
    }
}