<?php

namespace Sudoim\CTWing\Aep\DeviceModel;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_device_model';

    /**
     * @throws InvalidConfigException
     */
    public function queryPropertyList(string $masterKey, int|string $productId, string $searchValue = '', int $pageNow = 1, int $pageSize = 20, string $version = '20190712223330')
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

        return $this->httpGet('/dm/app/model/properties', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryServiceList(string $masterKey, int|string $productId, string $searchValue = '', int|string $searchType = '', int $pageNow = 1, int $pageSize = 20, string $version = '20190712224233')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId'   => $productId,
            'searchValue' => $searchValue,
            'searchType'  => $searchType,
            'pageNow'     => $pageNow,
            'pageSize'    => $pageSize
        ];

        return $this->httpGet('/dm/app/model/services', $query, $headers);
    }
}