<?php

namespace Sudoim\CTWing\Aep\ProductManagement;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_product_management';

    /**
     * @throws InvalidConfigException
     */
    public function queryProduct(int|string $productId, string $version = '20181031202055')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'productId' => $productId
        ];

        return $this->httpGet('/product', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryProductList(string $searchValue = '', int $pageNow = 1, int $pageSize = 20, string $version = '20190507004824')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'searchValue' => $searchValue,
            'pageNow'     => $pageNow,
            'pageSize'    => $pageSize
        ];

        return $this->httpGet('/products', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function deleteProduct(string $masterKey, int|string $productId, string $version = '20181031202029')
    {
        $headers = [
            'MasterKey' => $masterKey,
            'version'   => $version
        ];

        $query = [
            'productId' => $productId
        ];

        return $this->httpDelete('/product', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function createProduct(array $body, string $version = '20191018204154')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/product', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function updateProduct(array $body, string $version = '20191018204806')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPutJson('/product', [], $body, $headers);
    }
}