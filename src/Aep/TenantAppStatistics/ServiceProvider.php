<?php

namespace Sudoim\CTWing\Aep\TenantAppStatistics;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['tenantAppStatistics'] = function ($app) {
            return new Client($app);
        };
    }
}