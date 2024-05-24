<?php

namespace Sudoim\CTWing\Aep\DeviceCommand;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_device_command';

    /**
     * @throws InvalidConfigException
     */
    public function createCommand(string $masterKey, array $body, $version = '20190712225145')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/command', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryCommandList(string $masterKey, int|string $productId, string $deviceId, string $startTime = '', string $endTime = '', int $pageNow = 1, int $pageSize = 20, $version = '20200814163736')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'deviceId'  => $deviceId,
            'startTime' => $startTime,
            'endTime'   => $endTime,
            'pageNow'   => $pageNow,
            'pageSize'  => $pageSize
        ];

        return $this->httpGet('/commands', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryCommand(string $masterKey, int|string $commandId, int|string $productId, string $deviceId, string $version = '20190712225241')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'commandId' => $commandId,
            'productId' => $productId,
            'deviceId'  => $deviceId
        ];

        return $this->httpGet('/command', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function cancelCommand(string $masterKey, array $body = [], string $version = '20190615023142')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPutJson('/cancelCommand', [], $body, $headers);
    }
}