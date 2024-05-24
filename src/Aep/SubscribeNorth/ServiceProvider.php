<?php

namespace Sudoim\CTWing\Aep\SubscribeNorth;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['subscribeNorth'] = function ($app) {
            return new Client($app);
        };
    }
}