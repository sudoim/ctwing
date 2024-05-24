<?php

namespace Sudoim\CTWing\Aep\Usr;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['usr'] = function ($app) {
            return new Client($app);
        };
    }
}