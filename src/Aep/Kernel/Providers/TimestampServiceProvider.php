<?php

namespace Sudoim\CTWing\Aep\Kernel\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Sudoim\CTWing\Aep\Kernel\Timestamp;

class TimestampServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['timestamp'] = function ($app) {
            return new Timestamp($app);
        };
    }
}