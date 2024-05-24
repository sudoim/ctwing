<?php

namespace Sudoim\CTWing\Aep\Timestamp;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Sudoim\CTWing\Aep\Kernel\Timestamp;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['timestamp'] = function ($app) {
            return new Timestamp($app);
        };
    }
}