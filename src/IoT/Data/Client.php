<?php

namespace Sudoim\CTWing\IoT\Data;

use Sudoim\CTWing\IoT\Data\Action\QueryDeviceDataHistory;
use Sudoim\CTWing\IoT\Data\Action\QueryDeviceServiceCapabilities;
use Sudoim\CTWing\IoT\Kernel\BaseClient;

/**
 * @property QueryDeviceDataHistory $queryDeviceDataHistory 查询设备历史数据
 * @property QueryDeviceServiceCapabilities $queryDeviceServiceCapabilities 查询设备服务能力
 */
class Client extends BaseClient
{
}