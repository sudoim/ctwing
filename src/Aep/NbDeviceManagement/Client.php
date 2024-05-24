<?php

namespace Sudoim\CTWing\Aep\NbDeviceManagement;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_nb_device_management';

    /**
     * @throws InvalidConfigException
     */
    public function batchCreateDevice(array $body, string $version = '20200828140355')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/batchNBDevice', $body, $headers);
    }
}