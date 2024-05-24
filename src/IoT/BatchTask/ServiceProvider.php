<?php

namespace Sudoim\CTWing\IoT\BatchTask;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['batchTask'] = function ($app) {
            return new Client($app);
        };
    }
}