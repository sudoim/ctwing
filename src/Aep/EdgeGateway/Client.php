<?php

namespace Sudoim\CTWing\Aep\EdgeGateway;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_edge_gateway';
    
    /**
     * @throws InvalidConfigException
     */
    public function deleteEdgeInstanceDevice(array $body, string $version = '20201226000026')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/instance/devices', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryEdgeInstanceDevice(string $gatewayDeviceId, int $pageNow = 1, int $pageSize = 20, string $version = '20201226000022')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'gatewayDeviceId' => $gatewayDeviceId,
            'pageNow'         => $pageNow,
            'pageSize'        => $pageSize
        ];

        return $this->httpGet('/instance/devices', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function createEdgeInstance(array $body, string $version = '20201226000017')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/instance', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function edgeInstanceDeploy(array $body, string $version = '20201226000010')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/instance/settings', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function deleteEdgeInstance(int|string $id, string $version = '20201225235957')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'id' => $id
        ];

        return $this->httpDelete('/instance', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function addEdgeInstanceDevice(array $body, string $version = '20201226000004')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/instance/device', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function addEdgeInstanceDrive(array $body, string $version = '20201225235952')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/instance/device', $body, $headers);
    }
}