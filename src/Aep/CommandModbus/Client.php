<?php

namespace Sudoim\CTWing\Aep\CommandModbus;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_command_modbus';

    /**
     * @throws InvalidConfigException
     */
    public function queryCommandList(string $masterKey, int|string $productId, string $deviceId, string $status = '', string $startTime = '', string $endTime = '', int $pageNow = 1, int $pageSize = 20, string $version = '20200904171008')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'deviceId'  => $deviceId,
            'status'    => $status,
            'startTime' => $startTime,
            'endTime'   => $endTime,
            'pageNow'   => $pageNow,
            'pageSize'  => $pageSize
        ];

        return $this->httpGet('/modbus/commands', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryCommand(string $masterKey, int|string $productId, string $deviceId, string $commandId, string $version = '20200904172207')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'deviceId'  => $deviceId,
            'commandId' => $commandId
        ];

        return $this->httpGet('/modbus/command', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function cancelCommand(string $masterKey, array $body, string $version = '20200404012453')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPutJson('/modbus/cancelCommand', [], $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function createCommand(string $masterKey, array $body, string $version = '20200404012449')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/modbus/command', $body, $headers);
    }
}