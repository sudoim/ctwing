<?php

namespace Sudoim\CTWing\Aep\SubscribeNorth;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_subscribe_north';

    /**
     * @throws InvalidConfigException
     */
    public function getSubscription(string $masterKey, int|string $productId, string $subId, string $version = '20181031202033')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId,
            'subId'     => $subId
        ];

        return $this->httpGet('/subscription', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function getSubscriptionsList(string $masterKey, int|string $productId, string $searchValue = '', int|string $subType = '', int $pageNow = 1, int $pageSize = 20, string $version = '20181031202027')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId'   => $productId,
            'searchValue' => $searchValue,
            'subType'     => $subType,
            'pageNow'     => $pageNow,
            'pageSize'    => $pageSize
        ];

        return $this->httpGet('/subscribes', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function deleteSubscription(string $masterKey, int|string $productId, string $subId, int $subLevel, string $deviceId = '', string $version = '20181031202023')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId'   => $productId,
            'subId'       => $subId,
            'subLevel'    => $subLevel,
            'deviceId'    => $deviceId
        ];

        return $this->httpDelete('/subscribes', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function createSubscription(string $masterKey, array $body, string $version = '20181031202018')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        return $this->httpPostJson('/subscription', $body, $headers);
    }
}