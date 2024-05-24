<?php

namespace Sudoim\CTWing\Aep\TenantDeviceStatistics;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'tenant_device_statistics';

    /**
     * @throws InvalidConfigException
     */
    public function queryTenantDeviceCount(string $version = '20201225122555')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpGet('/queryTenantDeviceCount', [], $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryTenantDeviceTrend(string $dataType, string $type, string $version = '20201225122550')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'dataType' => $dataType,
            'type'     => $type
        ];

        return $this->httpGet('/queryTenantDeviceTrend', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryTenantDeviceActiveCount(string $version = '20201225122558')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpGet('/queryTenantDeviceActiveCount', [], $headers);
    }
}