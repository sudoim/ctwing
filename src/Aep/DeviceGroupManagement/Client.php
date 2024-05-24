<?php

namespace Sudoim\CTWing\Aep\DeviceGroupManagement;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_device_group_management';

    /**
     * @throws InvalidConfigException
     */
    public function createDeviceGroup(array $body, string $masterKey = '', string $version = '20190615001622')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/deviceGroup', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function updateDeviceGroup(array $body, string $masterKey = '', string $version = '20190615001615')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPutJson('/deviceGroup', [], $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function deleteDeviceGroup(int|string $productId, int|string $deviceGroupId, string $masterKey = '', string $version = '20190615001601')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId'     => $productId,
            'deviceGroupId' => $deviceGroupId
        ];

        return $this->httpDelete('/deviceGroup', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryDeviceGroupList(int|string $productId, string $searchValue = '', int $pageNow = 1, int $pageSize = 20, string $masterKey = '', string $version = '20190615001555')
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

        return $this->httpGet('/deviceGroups', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryGroupDeviceList(int|string $productId, int|string $deviceGroupId = '', string $searchValue = '', int $pageNow = 1, int $pageSize = 20, string $masterKey = '', string $version = '20190615001540')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId'     => $productId,
            'deviceGroupId' => $deviceGroupId,
            'searchValue'   => $searchValue,
            'pageNow'       => $pageNow,
            'pageSize'      => $pageSize
        ];

        return $this->httpGet('/groupDeviceList', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function updateDeviceGroupRelation(array $body, string $masterKey = '', string $version = '20190615001526')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPutJson('/deviceGroupRelation', [], $body, $headers);
    }
}