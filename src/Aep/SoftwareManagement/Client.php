<?php

namespace Sudoim\CTWing\Aep\SoftwareManagement;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_software_management';

    /**
     * @throws InvalidConfigException
     */
    public function updateSoftware(string $masterKey, int|string $id, string $version = '20200529232851')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'id' => $id
        ];

        return $this->httpPutJson('/software', $query, [], $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function deleteSoftware(string $masterKey, int|string $productId, int|string $id, string $version = '20200529232809')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'id'        => $id
        ];

        return $this->httpDelete('/software', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function querySoftware(string $masterKey, int|string $productId, int|string $id, string $version = '20200529232806')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'id'        => $id
        ];

        return $this->httpGet('/software', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function querySoftwareList(string $masterKey, int|string $productId, string $searchValue = '', int $pageNow = 1, int $pageSize = 20, string $version = '20200529232801')
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

        return $this->httpGet('/softwares', $query, $headers);
    }
}