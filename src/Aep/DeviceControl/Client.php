<?php

namespace Sudoim\CTWing\Aep\DeviceControl;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_device_control';

    /**
     * @throws InvalidConfigException
     */
    public function queryRemoteControlList(string $masterKey, int|string $productId, string $searchValue = '', int|string $type = '', int|string $status = '', string $startTime = '', string $endTime = '', int $pageNow = 1, int $pageSize = 20, string $version = '20190507012630')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId'   => $productId,
            'searchValue' => $searchValue,
            'type'        => $type,
            'status'      => $status,
            'startTime'   => $startTime,
            'endTime'     => $endTime,
            'pageNow'     => $pageNow,
            'pageSize'    => $pageSize
        ];

        return $this->httpGet('/controls', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function createRemoteControl(string $masterKey, array $body, string $version = '20181031202247')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/controls', $body, $headers);
    }
}