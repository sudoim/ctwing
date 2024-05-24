<?php

namespace Sudoim\CTWing\Aep\StandardManagement;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_standard_management';

    /**
     * @throws InvalidConfigException
     */
    public function queryStandardModel(int|string $thirdType, string $standardVersion = '', string $version = '20190713033424')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'standardVersion' => $standardVersion,
            'thirdType'       => $thirdType
        ];

        return $this->httpGet('/standardModel', $query, $headers);
    }
}