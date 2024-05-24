<?php

namespace Sudoim\CTWing\Aep\StandardManagement;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['standardManagement'] = function ($app) {
            return new Client($app);
        };
    }
}