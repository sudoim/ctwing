<?php

namespace Sudoim\CTWing\Aep\CommandModbus;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['commandModbus'] = function ($app) {
            return new Client($app);
        };
    }
}