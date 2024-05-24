<?php

namespace Sudoim\CTWing\Aep\FirmwareManagement;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['firmwareManagement'] = function ($app) {
            return new Client($app);
        };
    }
}