<?php

namespace Sudoim\CTWing\Kernel\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Sudoim\CTWing\Kernel\Log\LogManager;

class LogServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        !isset($pimple['log']) && $pimple['log'] = function ($app) {
            $config = $app['config']->get('log');

            if (!empty($config)) {
                $app->rebind('config', $app['config']->merge($config));
            }

            return new LogManager($app);
        };

        !isset($pimple['logger']) && $pimple['logger'] = $pimple['log'];
    }
}