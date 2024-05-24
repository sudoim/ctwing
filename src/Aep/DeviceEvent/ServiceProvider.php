<?php

namespace Sudoim\CTWing\Aep\DeviceEvent;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['deviceEvent'] = function ($app) {
            return new Client($app);
        };
    }
}