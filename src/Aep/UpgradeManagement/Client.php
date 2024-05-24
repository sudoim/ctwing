<?php

namespace Sudoim\CTWing\Aep\UpgradeManagement;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_upgrade_management';

    /**
     * @throws InvalidConfigException
     */
    public function queryRemoteUpgradeDetail(int|string $productId, int|string $id, string $masterKey = '', string $version = '20190615001517')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version,
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
    public function queryRemoteUpgradeTask(int|string $productId, int|string $id, string $masterKey = '', string $version = '20190615001509')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version,
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
    public function controlRemoteUpgradeTask(int|string $id, array $body, string $masterKey = '', string $version = '20190615001456')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version,
        ];

        $query = [
            'id'        => $id
        ];

        return $this->httpPutJson('/control', $query, $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryRemoteUpgradeDeviceList(int|string $productId, int|string $isSelectDevice, int|string $id, int $pageNow = 1, int $pageSize = 20, string $masterKey = '', string $deviceIdSearch = '', string $deviceNameSearch = '', string $imeiSearch = '', string $deviceNoSearch = '', string $deviceGroupIdSearch = '', string $version = '20190615001451')
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
    public function deleteRemoteUpgradeTask(int|string $productId, int|string $id, string $updateBy = '', string $masterKey = '', string $version = '20190615001444')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'id'        => $id,
            'updateBy'  => $updateBy,
        ];

        return $this->httpDelete('/task', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryRemoteUpgradeTaskList(int|string $productId, string $searchValue = '', int $pageNow = 1, int $pageSize = 20, string $masterKey = '', string $version = '20190615001440')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId'   => $productId,
            'searchValue' => $searchValue,
            'pageNow'     => $pageNow,
            'pageSize'    => $pageSize,
        ];

        return $this->httpGet('/tasks', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function modifyRemoteUpgradeTask(int|string $id, array $body, string $masterKey = '', string $version = '20190615001433')
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
    public function createRemoteUpgradeTask(array $body, string $masterKey = '', string $version = '20190615001416')
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
    public function operationalRemoteUpgradeTask(array $body, string $masterKey = '', string $version = '20190615001412')
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
    public function queryRemoteUpgradeSubtasks(int|string $productId, int|string $id, int|string $taskStatus = '', string $searchValue = '', int $pageNow = 1, int $pageSize = 20, string $masterKey = '', string $version = '20190615001406')
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
            'pageSize'    => $pageSize
        ];

        return $this->httpGet('/details', $query, $headers);
    }
}