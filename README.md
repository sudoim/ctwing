<h1 align="center">CTWing</h1>

<p align="center">非官方的中国电信物联网SDK</p>

## 环境要求

- PHP >= 8.0
- [Composer](https://getcomposer.org/)
- fileinfo扩展

## 扩展安装

```shell
$ composer require sudoim/ctwing
```

## 基本使用

`AEP`

```php
<?php

use Sudoim\CTWing\Factory;

$config = [
    'app_key'    => '',
    'app_secret' => ''
];

$app = Factory::Aep($config);

$masterKey = '';
$productId = '';
$deviceId  = '';

// 增加设备(不需要手动转JSON格式)
$result = $app->deviceManagement->createDevice($masterKey, [
    'productId'  => $productId,
    'deviceName' => '',
    'deviceSn'   => '',
    'imei'       => '',
    'operator'   => '',
    'other'      => [
        'autoObserver' => 0,
        'imsi'         => '',
        'pskValue'     => ''
    ]
]);

// 批量获取设备信息
$result = $app->deviceManagement->queryDeviceList($masterKey, $productId);

// 获取单个设备详情
$result = $app->deviceManagement->queryDevice($masterKey, $productId, $deviceId);

// 指令下发(不需要手动转JSON格式)
$result = $app->deviceCommand->createCommand($masterKey, [
    'productId' => $productId,
    'deviceId'  => $deviceId,
    'operator'  => '',
    'content' => [
        'jtMessageId' => '',
        'dataType'    => '',
        'payload'     => ''
    ]
]);

// ...
// 更多API调用可以参考官方文档中所属的对应模块和方法名称
```

`IoT`
```php
<?php

use Sudoim\CTWing\Factory;

$config = [
    'app_key'    => '',
    'app_secret' => '',

    // 覆盖应用接入地址
    'http' => [
        // 填写自己的应用接入地址和端口
        'base_uri' => 'https://device.api.ct10649.com:8743/'
    ]
];

$app = Factory::IoT($config);

$imei     = '';
$deviceId = '';

// 注册设备
$result = $app->reg
    ->registerDevice
    ->setNodeId($imei)
    ->setVerifyCode($imei)
    ->send();

// 删除设备
$result = $app->dm
    ->deleteDevice
    ->setDeviceId($deviceId)
    ->send();

// ...
// 以下是1.5.1文档对应的API调用名称
// 所有的API都有setApiVersion和send方法
// 最后必须要调用send方法才会真正发送请求

// 2.2.1 注册设备
//$result = $app->reg->registerDevice;

// 2.2.2 刷新设备密钥
//$result = $app->reg->refreshDeviceKey;

// 2.2.3 修改设备信息
//$result = $app->dm->updateDevice;

// 2.2.4 删除设备
//$result = $app->dm->deleteDevice;

// 2.2.5 查询设备激活状态
//$result = $app->reg->queryDeviceActiveStatus

// 2.3.1 创建批量任务
//$result = $app->batchTask->createTasks;

// 2.3.2 查询指定批量任务信息
//$result = $app->batchTask->queryTask;

// 2.3.3 查询批量任务的子任务信息
//$result = $app->batchTask->querySubTask;

// 2.4.1 创建规则
//$result = $app->rule->createRule;

// 2.4.2 修改规则
//$result = $app->rule->updateRule;

// 2.4.3 删除规则
//$result = $app->rule->deleteRule;

// 2.4.4 查找规则
//$result = $app->rule->queryRule;

// 2.4.5 修改规则状态
//$result = $app->rule->updateRuleStatus;

// 2.4.6 批量修改规则状态
//$result = $app->rule->updateRulesStatus;

// 2.5.1 订阅平台业务数据
//$result = $app->sub->subscribeBusinessData;

// 2.5.2 订阅平台管理数据
//$result = $app->sub->subscribeManagementData;

// 2.5.3 查询单个订阅
//$result = $app->sub->querySubscription;

// 2.5.4 批量查询订阅
//$result = $app->sub->querySubscriptions;

// 2.5.5 删除单个订阅
//$result = $app->sub->deleteSubscription;

// 2.5.6 批量删除订阅
//$result = $app->sub->deleteSubscriptions;

// 2.7.1 创建设备命令
//$result = $app->cmd->createCommand;

// 2.7.2 查询设备命令
//$result = $app->cmd->queryCommand;

// 2.7.3 修改设备命令
//$result = $app->cmd->updateCommand;

// 2.7.4 批量创建设备命令(使用2.3.1, 将taskType设置为DeviceCmd即可)
//$result = $app->batchTask->createTasks;

// 2.7.5 创建设备命令撤销任务
//$result = $app->cmd->revokeCommand;

// 2.7.6 查询设备命令撤销任务
//$result = $app->cmd->queryRevokeCommand;

// 2.8.1 查询单个设备信息
//$result = $app->dm->queryDevice;

// 2.8.2 批量查询设备信息
//$result = $app->dm->queryDevices;

// 2.8.3 查询设备历史数据
//$result = $app->data->queryDeviceHistoryData;

// 2.8.4 查询设备服务能力
//$result = $app->data->queryDeviceServiceCapabilities;

// 2.9.1 创建设备组
//$result = $app->devGroup->createDeviceGroup;

// 2.9.2 删除设备组
//$result = $app->devGroup->deleteDeviceGroup;

// 2.9.3 修改设备组
//$result = $app->devGroup->updateDeviceGroup;

// 2.9.4 查询设备组列表
//$result = $app->devGroup->queryDeviceGroups;

// 2.9.5 查询指定设备组
//$result = $app->devGroup->queryDeviceGroup;

// 2.9.6 查询指定设备组成员
//$result = $app->dm->queryDeviceGroupMember;

// 2.9.7 增加设备组成员
//$result = $app->dm->addDeviceGroupMember;

// 2.10.1 查询版本包列表
//$result = $app->northbound->queryVersionPackages;

// 2.10.2 查询指定版本包
//$result = $app->northbound->queryVersionPackage;

// 2.10.3 删除指定版本包
//$result = $app->northbound->deleteVersionPackage;

// 2.10.4 创建软件升级任务
//$result = $app->northbound->createSoftwareUpgradeTask;

// 2.10.5 创建固件升级任务
//$result = $app->northbound->createFirmwareUpgradeTask;

// 2.10.6 查询指定升级任务详情
//$result = $app->northbound->queryUpgradeTask;

// 2.10.7 查询指定升级任务的子任务详情
//$result = $app->northbound->queryUpgradeSubTasks;

// 2.10.8 查询升级任务列表
//$result = $app->northbound->queryUpgradeTasks;
```