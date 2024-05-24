<?php

namespace Sudoim\CTWing\IoT\Sub;

use Sudoim\CTWing\IoT\Kernel\BaseClient;
use Sudoim\CTWing\IoT\Sub\Action\DeleteSubscription;
use Sudoim\CTWing\IoT\Sub\Action\DeleteSubscriptions;
use Sudoim\CTWing\IoT\Sub\Action\QuerySubscription;
use Sudoim\CTWing\IoT\Sub\Action\QuerySubscriptions;
use Sudoim\CTWing\IoT\Sub\Action\SubscribeBusinessData;
use Sudoim\CTWing\IoT\Sub\Action\SubscribeManagementData;

/**
 * @property SubscribeBusinessData $subscribeBusinessData 订阅平台业务数据
 * @property SubscribeManagementData $subscribeManagementData 订阅平台管理数据
 * @property QuerySubscription $querySubscription 查询单个订阅
 * @property QuerySubscriptions $querySubscriptions 批量查询订阅
 * @property DeleteSubscription $deleteSubscription 删除单个订阅
 * @property DeleteSubscriptions $deleteSubscriptions 批量删除订阅
 */
class Client extends BaseClient
{
}