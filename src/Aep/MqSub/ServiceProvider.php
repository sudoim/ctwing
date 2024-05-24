<?php

namespace Sudoim\CTWing\Aep\MqSub;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['mqSub'] = function ($app) {
            return new Client($app);
        };
    }
}