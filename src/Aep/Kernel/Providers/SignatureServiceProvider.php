<?php

namespace Sudoim\CTWing\Aep\Kernel\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Sudoim\CTWing\Aep\Kernel\Signature;

class SignatureServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['signature'] = function ($app) {
            return new Signature($app);
        };
    }
}