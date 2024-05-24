<?php

namespace Sudoim\CTWing\IoT\Cmd;

use Sudoim\CTWing\IoT\Cmd\Action\CreateCommand;
use Sudoim\CTWing\IoT\Cmd\Action\QueryCommand;
use Sudoim\CTWing\IoT\Cmd\Action\QueryRevokeCommand;
use Sudoim\CTWing\IoT\Cmd\Action\RevokeCommand;
use Sudoim\CTWing\IoT\Cmd\Action\UpdateCommand;
use Sudoim\CTWing\IoT\Kernel\BaseClient;

/**
 * @property CreateCommand $createCommand 创建设备命令
 * @property QueryCommand $queryCommand 查询设备命令
 * @property UpdateCommand $updateCommand 修改设备命令
 * @property RevokeCommand $revokeCommand 创建设备命令撤销任务
 * @property QueryRevokeCommand $queryRevokeCommand 查询设备命令撤销任务
 */
class Client extends BaseClient
{
}