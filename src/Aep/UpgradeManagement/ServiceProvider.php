<?php

namespace Sudoim\CTWing\Aep\UpgradeManagement;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['upgradeManagement'] = function ($app) {
            return new Client($app);
        };
    }
}