<?php

namespace Sudoim\CTWing\Aep\TenantDeviceStatistics;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['tenantDeviceStatistics'] = function ($app) {
            return new Client($app);
        };
    }
}