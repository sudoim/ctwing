<?php

namespace Sudoim\CTWing\IoT\Reg;

use Sudoim\CTWing\IoT\Kernel\BaseClient;
use Sudoim\CTWing\IoT\Reg\Action\QueryDeviceActiveStatus;
use Sudoim\CTWing\IoT\Reg\Action\RefreshDeviceKey;
use Sudoim\CTWing\IoT\Reg\Action\RegisterDevice;

/**
 * @property RegisterDevice $registerDevice 注册设备
 * @property RefreshDeviceKey $refreshDeviceKey 刷新设备密钥
 * @property QueryDeviceActiveStatus $queryDeviceActiveStatus 查询设备激活状态
 */
class Client extends BaseClient
{
}