<?php

namespace Sudoim\CTWing\Aep\SoftwareUpgradeManagement;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['softwareUpgradeManagement'] = function ($app) {
            return new Client($app);
        };
    }
}