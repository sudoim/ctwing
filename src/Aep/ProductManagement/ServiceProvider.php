<?php

namespace Sudoim\CTWing\Aep\ProductManagement;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['productManagement'] = function ($app) {
            return new Client($app);
        };
    }
}