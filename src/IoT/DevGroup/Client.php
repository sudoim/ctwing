<?php

namespace Sudoim\CTWing\IoT\DevGroup;

use Sudoim\CTWing\IoT\DevGroup\Action\CreateDeviceGroup;
use Sudoim\CTWing\IoT\DevGroup\Action\DeleteDeviceGroup;
use Sudoim\CTWing\IoT\DevGroup\Action\QueryDeviceGroup;
use Sudoim\CTWing\IoT\DevGroup\Action\QueryDeviceGroups;
use Sudoim\CTWing\IoT\DevGroup\Action\UpdateDeviceGroup;
use Sudoim\CTWing\IoT\Kernel\BaseClient;

/**
 * @property CreateDeviceGroup $createDeviceGroup 创建设备组
 * @property DeleteDeviceGroup $deleteDeviceGroup 删除设备组
 * @property UpdateDeviceGroup $updateDeviceGroup 修改设备组
 * @property QueryDeviceGroup $queryDeviceGroup 查询指定设备组
 * @property QueryDeviceGroups $queryDeviceGroups 查询设备组列表
 */
class Client extends BaseClient
{
}