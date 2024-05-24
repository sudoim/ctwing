<?php

namespace Sudoim\CTWing\IoT\Dm;

use Sudoim\CTWing\IoT\Dm\Action\AddDeviceGroupMember;
use Sudoim\CTWing\IoT\Dm\Action\DeleteDevice;
use Sudoim\CTWing\IoT\Dm\Action\DeleteDeviceGroupMember;
use Sudoim\CTWing\IoT\Dm\Action\QueryDevice;
use Sudoim\CTWing\IoT\Dm\Action\QueryDeviceGroupMember;
use Sudoim\CTWing\IoT\Dm\Action\QueryDevices;
use Sudoim\CTWing\IoT\Dm\Action\UpdateDevice;
use Sudoim\CTWing\IoT\Kernel\BaseClient;

/**
 * @property UpdateDevice $updateDevice 修改设备信息
 * @property DeleteDevice $deleteDevice 删除设备
 * @property QueryDevice $queryDevice 查询单个设备信息
 * @property QueryDevices $queryDevices 批量查询设备信息
 * @property QueryDeviceGroupMember $queryDeviceGroupMember 查询指定设备组成员
 * @property AddDeviceGroupMember $addDeviceGroupMember 添加设备组成员
 * @property DeleteDeviceGroupMember $deleteDeviceGroupMember 删除设备组成员
 */
class Client extends BaseClient
{
}