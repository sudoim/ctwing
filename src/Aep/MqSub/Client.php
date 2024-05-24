<?php

namespace Sudoim\CTWing\Aep\MqSub;

use Sudoim\CTWing\Aep\Kernel\BaseClient;
use Sudoim\CTWing\Aep\Kernel\Exceptions\InvalidConfigException;

class Client extends BaseClient
{
    protected string $path = 'aep_mq_sub';

    /**
     * @throws InvalidConfigException
     */
    public function queryServiceState(string $version = '20201218144210')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpGet('/mqStat', [], $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function openMqService(string $version = '20201217094438')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/mqStat', [], $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function createTopic(array $body, string $version = '20201218142343')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/topic', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryTopicInfo(int|string $topicId, string $version = '20201218153403')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'topicId' => $topicId
        ];

        return $this->httpGet('/topic', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryTopicCacheInfo(int|string $topicId, string $version = '20201218150354')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'topicId' => $topicId
        ];

        return $this->httpGet('/topic/cache', $query, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function queryTopics(string $version = '20201218153456')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpGet('/topics', [], $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function changeTopicInfo(int|string $topicId, array $body, string $version = '20201218153044')
    {
        $headers = [
            'version' => $version
        ];

        $query = [
            'topicId' => $topicId
        ];

        return $this->httpPutJson('/topic', $query, $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function querySubRules(array $body, string $version = '20201218160237')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPostJson('/rule', $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function changeSubRules(array $body, string $version = '20201218161013')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpPutJson('/rule', [], $body, $headers);
    }

    /**
     * @throws InvalidConfigException
     */
    public function closePushService(string $version = '20201217141937')
    {
        $headers = [
            'version' => $version
        ];

        return $this->httpDelete('/mqStat', [], $headers);
    }
}