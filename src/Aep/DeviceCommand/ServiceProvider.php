<?php

namespace Sudoim\CTWing\Aep\DeviceCommand;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['deviceCommand'] = function ($pimple) {
            return new Client($pimple);
        };
    }
}