<?php

namespace Sudoim\CTWing\Aep\SoftwareManagement;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['softwareManagement'] = function ($app) {
            return new Client($app);
        };
    }
}