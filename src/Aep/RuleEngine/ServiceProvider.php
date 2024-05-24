<?php

namespace Sudoim\CTWing\Aep\RuleEngine;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['ruleEngine'] = function ($app) {
            return new Client($app);
        };
    }
}