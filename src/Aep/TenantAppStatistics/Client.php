<?php

namespace Sudoim\CTWing\Aep\TenantAppStatistics;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'tenant_app_statistics';

    /**
     * @throws InvalidConfigException
     */
    public function queryTenantApiMonthlyCount(string $version = '20201225122609')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpGet('/queryTenantApiMonthlyCount', [], $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryTenantAppCount(string $version = '20201225122611')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpGet('/queryTenantAppCount', [], $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryTenantApiTrend(string $dataType, string $type, string $version = '20201225122606')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'dataType' => $dataType,
            'type'     => $type
        ];

        return $this->httpGet('/queryTenantAppCount', $query, $headers);
    }
}