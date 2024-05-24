<?php

namespace Sudoim\CTWing\Aep\RuleEngine;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_rule_engine';

    /**
     * @throws InvalidConfigException
     */
    public function saasCreateRule(array $body, string $version = '20200111000503')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/api/v2/rule/sass/createRule', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function saasQueryRule(int|string $productId, string $ruleId = '', int $pageNow = 1, int $pageSize = 20, string $version = '20200111000633')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'productId' => $productId,
            'ruleId'    => $ruleId,
            'pageNow'   => $pageNow,
            'pageSize'  => $pageSize
        ];

        return $this->httpGet('/api/v2/rule/sass/queryRule', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function saasUpdateRule(array $body, string $version = '20200111000540')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/api/v2/rule/sass/updateRule', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function saasDeleteRuleEngine(array $body, string $version = '20200111000611')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/api/v2/rule/sass/deleteRule', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function createRule(array $body, string $version = '20210327062633')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/v3/rule/createRule', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function updateRule(array $body, string $version = '20210327062642')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/v3/rule/updateRule', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function deleteRule(array $body, string $version = '20210327062626')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/v3/rule/deleteRule', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function getRules(string $ruleId = '', int|string $productId = '', int $pageNow = 1, int $pageSize = 20, string $version = '20210327062616')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'ruleId'    => $ruleId,
            'productId' => $productId,
            'pageNow'   => $pageNow,
            'pageSize'  => $pageSize
        ];

        return $this->httpGet('/v3/rule/getRules', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function getRuleRunStatus(array $body, string $version = '20210327062610')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/v3/rule/getRuleRunningStatus', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function updateRuleRunStatus(array $body, string $version = '20210327062603')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/v3/rule/modifyRuleRunningStatus', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function createForward(array $body, string $version = '20210327062556')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/v3/rule/addForward', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function updateForward(array $body, string $version = '20210327062549')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/v3/rule/updateForward', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function deleteForward(array $body, string $version = '20210327062539')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/v3/rule/deleteForward', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function getForwards(string $ruleId, int|string $productId = '', int $pageNow = 1, int $pageSize = 20, string $version = '20210327062531')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'ruleId'    => $ruleId,
            'productId' => $productId,
            'pageNow'   => $pageNow,
            'pageSize'  => $pageSize
        ];

        return $this->httpGet('/v3/rule/getForwards', $query, $headers);
    }
}