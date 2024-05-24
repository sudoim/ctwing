<?php

namespace Sudoim\CTWing\Aep\DeviceCommandLwmProfile;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_device_command_lwm_profile';

    /**
     * @throws InvalidConfigException
     */
    public function createCommandLwm2mProfile(string $masterKey, array $body, string $version = '20191231141545')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/commandLwm2mProfile', $body, $headers);
    }
}