<?php

namespace Sudoim\CTWing\Aep\ModbusDeviceManagement;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_modbus_device_management';

    /**
     * @throws InvalidConfigException
     */
    public function updateDevice(string $masterKey, string $deviceId, array $body, string $version = '20200404012440')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'deviceId' => $deviceId
        ];

        return $this->httpPutJson('/modbus/device', $query, $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function createDevice(array $body, string $version = '20200404012437')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/modbus/device', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryDevice(string $masterKey, int|string $productId, string $deviceId, string $version = '20200404012435')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'deviceId'  => $deviceId
        ];

        return $this->httpGet('/modbus/device', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryDeviceList(string $masterKey, int|string $productId, string $searchValue = '', int $pageNow = 1, int $pageSize = 20, string $version = '20200404012428')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'searchValue' => $searchValue,
            'pageNow'     => $pageNow,
            'pageSize'    => $pageSize
        ];

        return $this->httpGet('/modbus/devices', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function deleteDevice(string $masterKey, int|string $productId, string $deviceIds, string $version = '20200404012437')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'deviceIds' => $deviceIds
        ];

        return $this->httpDelete('/modbus/device', $query, $headers);
    }
}