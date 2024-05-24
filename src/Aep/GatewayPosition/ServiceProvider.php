<?php

namespace Sudoim\CTWing\Aep\GatewayPosition;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['gatewayPosition'] = function ($app) {
            return new Client($app);
        };
    }
}