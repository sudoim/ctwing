<?php

namespace Sudoim\CTWing\Aep\DeviceStatus;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_device_status';

    /**
     * @throws InvalidConfigException
     */
    public function queryDeviceStatus(array $body, string $version = '20181031202028')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/deviceStatus', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryDeviceStatusList(array $body, string $version = '20181031202403')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/deviceStatusList', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function getDeviceStatusHisInTotal(array $body, string $version = '20190928013529')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/api/v1/getDeviceStatusHisInTotal', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function getDeviceStatusHisInPage(array $body, string $version = '20190928013337')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/getDeviceStatusHisInPage', $body, $headers);
    }
}