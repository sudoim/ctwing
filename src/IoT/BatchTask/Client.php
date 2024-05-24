<?php

namespace Sudoim\CTWing\IoT\BatchTask;

use Sudoim\CTWing\IoT\BatchTask\Action\CreateTasks;
use Sudoim\CTWing\IoT\BatchTask\Action\QueryTask;
use Sudoim\CTWing\IoT\BatchTask\Action\QuerySubTask;
use Sudoim\CTWing\IoT\Kernel\BaseClient;

/**
 * @property CreateTasks $createTasks 创建批量任务
 * @property QueryTask $queryTask 查询指定批量任务信息
 * @property QuerySubTask $querySubTask 查询批量任务的子任务信息
 */
class Client extends BaseClient
{
}