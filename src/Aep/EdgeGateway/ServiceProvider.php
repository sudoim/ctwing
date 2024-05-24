<?php

namespace Sudoim\CTWing\Aep\EdgeGateway;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['edgeGateway'] = function ($app) {
            return new Client($app);
        };
    }
}