<?php

namespace Sudoim\CTWing\Aep\FirmwareManagement;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_firmware_management';

    /**
     * @throws InvalidConfigException
     */
    public function updateFirmware(int|string $id, array $body, string $masterKey = '', string $version = '20190615001705')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'id' => $id
        ];

        return $this->httpPutJson('/firmware', $query, $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryFirmwareList(int|string $productId, string $searchValue = '', int $pageNow = 1, int $pageSize = 20, string $masterKey = '', string $version = '20190615001608')
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

        return $this->httpGet('/firmwares', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryFirmware(int|string $productId, int|string $id, string $masterKey = '', string $version = '20190618151645')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId'   => $productId,
            'id'          => $id
        ];

        return $this->httpGet('/firmware', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function deleteFirmware(int|string $productId, int|string $id, string $updateBy = '', string $masterKey = '', string $version = '20190615001534')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId'   => $productId,
            'id'          => $id,
            'updateBy'    => $updateBy
        ];

        return $this->httpDelete('/firmware', $query, $headers);
    }
}