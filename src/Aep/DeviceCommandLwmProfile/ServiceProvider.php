<?php

namespace Sudoim\CTWing\Aep\DeviceCommandLwmProfile;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['deviceCommandLwmProfile'] = function ($app) {
            return new Client($app);
        };
    }
}