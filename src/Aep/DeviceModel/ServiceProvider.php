<?php

namespace Sudoim\CTWing\Aep\DeviceModel;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['deviceModel'] = function ($app) {
            return new Client($app);
        };
    }
}