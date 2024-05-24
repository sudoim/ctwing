<?php

namespace Sudoim\CTWing\Aep\Usr;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'usr';

    /**
     * @throws InvalidConfigException
     */
    public function sdkDownload(string $filename, string $applicationId, string $sdkType = 'php', string $apiVersion = '', string $version = '20180000000000')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'file_name'      => $filename,
            'application_id' => $applicationId,
            'sdk_type'       => $sdkType,
            'api_version'    => $apiVersion
        ];

        return $this->requestRaw('/sdk/download', 'GET', ['query' => $query, 'headers' => $headers])->getBodyContents();
    }
}