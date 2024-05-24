<?php

namespace Sudoim\CTWing\IoT\Reg;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['reg'] = function ($app) {
            return new Client($app);
        };
    }
}