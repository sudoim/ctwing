<?php

namespace Sudoim\CTWing\Aep\GatewayPosition;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_gateway_position';

    /**
     * @throws InvalidConfigException
     */
    public function getPosition(string $cardId, int|string $posReqType, string $version = '20190301085737')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'cardId'     => $cardId,
            'posReqType' => $posReqType
        ];

        return $this->httpGet('/api/getPosition', $query, $headers);
    }
}