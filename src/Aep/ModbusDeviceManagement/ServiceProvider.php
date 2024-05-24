<?php

namespace Sudoim\CTWing\Aep\ModbusDeviceManagement;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['modbus_device_management'] = function ($app) {
            return new CLient($app);
        };
    }
}