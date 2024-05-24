<?php

namespace Sudoim\CTWing\Aep\SoftwareUpgradeManagement;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_software_upgrade_management';

    /**
     * @throws InvalidConfigException
     */
    public function operationalSoftwareUpgradeTask(string $masterKey, array $body, string $version = '20200529233236')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/operational', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function querySoftwareUpgradeSubtasks(string $masterKey, int|string $productId, int|string $id, int|string $taskStatus = '', string $searchValue = '', int $pageNow = 1, int $pageSize = 20, string $version = '20200529233212')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId'   => $productId,
            'id'          => $id,
            'taskStatus'  => $taskStatus,
            'searchValue' => $searchValue,
            'pageNow'     => $pageNow,
            'pageSize'    => $pageSize,
        ];

        return $this->httpGet('/details', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function querySoftwareUpgradeTask(string $masterKey, int|string $productId, int|string $id, string $version = '20200529233136')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'id'        => $id
        ];

        return $this->httpGet('/task', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function createSoftwareUpgradeTask(string $masterKey, array $body, string $version = '20200529233123')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/task', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function modifySoftwareUpgradeTask(string $masterKey, int|string $id, array $body, string $version = '20200529233103')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'id' => $id
        ];

        return $this->httpPutJson('/task', $query, $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function controlSoftwareUpgradeTask(string $masterKey, int|string $id, array $body, string $version = '20200529233046')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'id' => $id
        ];

        return $this->httpPutJson('/control', $query, $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function deleteSoftwareUpgradeTask(string $masterKey, int|string $productId, int|string $id, string $updateBy = '', string $version = '20200529233037')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'id'        => $id,
            'updateBy'  => $updateBy
        ];

        return $this->httpDelete('/task', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function querySoftwareUpgradeDeviceList(string $masterKey, int|string $productId, int|string $isSelectDevice, int|string $id = '', int $pageNow = 1, int $pageSize = 20, string $deviceIdSearch = '', string $deviceNameSearch = '', string $imeiSearch = '', string $deviceNoSearch = '', string $deviceGroupIdSearch = '', string $version = '20200529233027')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId'           => $productId,
            'isSelectDevice'      => $isSelectDevice,
            'id'                  => $id,
            'pageNow'             => $pageNow,
            'pageSize'            => $pageSize,
            'deviceIdSearch'      => $deviceIdSearch,
            'deviceNameSearch'    => $deviceNameSearch,
            'imeiSearch'          => $imeiSearch,
            'deviceNoSearch'      => $deviceNoSearch,
            'deviceGroupIdSearch' => $deviceGroupIdSearch,
        ];

        return $this->httpGet('/devices', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function querySoftwareUpgradeDetail(string $masterKey, int|string $productId, int|string $id, string $version = '20200529233010')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'id'        => $id
        ];

        return $this->httpGet('/detail', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function querySoftwareUpgradeTaskList(string $masterKey, int|string $productId, string $searchValue = '', int $pageNow = 1, int $pageSize = 20, string $version = '20200529232940')
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

        return $this->httpGet('/tasks', $query, $headers);
    }
}