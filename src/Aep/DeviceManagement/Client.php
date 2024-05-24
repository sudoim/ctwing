<?php

namespace Sudoim\CTWing\Aep\DeviceManagement;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_device_management';

    /**
     * @throws InvalidConfigException
     */
    public function queryDeviceList(string $masterKey, int|string $productId, string $searchValue = '', int $pageNow = 1, int $pageSize = 10, string $version = '20190507012134')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId'   => $productId,
            'searchValue' => $searchValue,
            'pageNow'     => $pageNow,
            'pageSize'    => $pageSize
        ];

        return $this->httpGet('/devices', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryDevice(string $masterKey, int|string $productId, string $deviceId, string $version = '20181031202139')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'deviceId'  => $deviceId
        ];

        return $this->httpGet('/device', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function deleteDevice(string $masterKey, int|string $productId, string|array $deviceIds, string $version = '20181031202131')
    {
        if (is_array($deviceIds)) {
            $deviceIds = implode(',', $deviceIds);
        }

        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'deviceIds' => $deviceIds
        ];

        return $this->httpDelete('/device', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function updateDevice(string $masterKey, string $deviceId, array $body, string $version = '20181031202122')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'deviceId'  => $deviceId
        ];

        return $this->httpPutJson('/device', $query, $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function createDevice(string $masterKey, array $body, string $version = '20181031202117')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/device', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function bindDevice(string $masterKey, array $body, string $version = '20191024140057')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/bindDevice', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function unbindDevice(string $masterKey, array $body, string $version = '20191024140103')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/unbindDevice', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryProductInfoByImei(string $masterKey, string $imei, string $version = '20191213161859')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'imei'  => $imei,
        ];

        return $this->httpGet('/device/getProductInfoFromApiByImei', $query, $headers);
    }
}