<?php

namespace Sudoim\CTWing\IoT\Cmd;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['cmd'] = function ($app) {
            return new Client($app);
        };
    }
}