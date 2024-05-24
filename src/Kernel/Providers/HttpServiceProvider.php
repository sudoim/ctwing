<?php

namespace Sudoim\CTWing\Kernel\Providers;

use GuzzleHttp\Client;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class HttpServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['http_client'] = function ($pimple) {
            return new Client($pimple->config->get('http', []));
        };
    }
}