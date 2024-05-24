<?php

namespace Sudoim\CTWing\IoT\Rule;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['rule'] = function ($app) {
            return new Client($app);
        };
    }
}