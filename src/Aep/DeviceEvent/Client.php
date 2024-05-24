<?php

namespace Sudoim\CTWing\Aep\DeviceEvent;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_device_event';

    /**
     * @throws InvalidConfigException
     */
    public function queryDeviceEventList(string $masterKey, array $body, string $version = '20210327064751')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/device/events', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryDeviceEventTotal(string $masterKey, array $body, string $version = '20210327064755')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/device/events/total', $body, $headers);
    }
}