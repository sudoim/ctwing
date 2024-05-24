<?php

namespace Sudoim\CTWing\IoT\Northbound;

use Sudoim\CTWing\IoT\Kernel\BaseClient;
use Sudoim\CTWing\IoT\Northbound\Action\CreateFirmwareUpgradeTask;
use Sudoim\CTWing\IoT\Northbound\Action\CreateSoftwareUpgradeTask;
use Sudoim\CTWing\IoT\Northbound\Action\DeleteVersionPackage;
use Sudoim\CTWing\IoT\Northbound\Action\QueryUpgradeSubTasks;
use Sudoim\CTWing\IoT\Northbound\Action\QueryUpgradeTask;
use Sudoim\CTWing\IoT\Northbound\Action\QueryUpgradeTasks;
use Sudoim\CTWing\IoT\Northbound\Action\QueryVersionPackage;
use Sudoim\CTWing\IoT\Northbound\Action\QueryVersionPackages;

/**
 * @property QueryVersionPackage $queryVersionPackage 查询指定版本包
 * @property QueryVersionPackages $queryVersionPackages 查询指定版本包
 * @property DeleteVersionPackage $deleteVersionPackage 删除指定版本包
 * @property CreateSoftwareUpgradeTask $createSoftwareUpgradeTask 创建软件升级任务
 * @property CreateFirmwareUpgradeTask $createFirmwareUpgradeTask 创建固件升级任务
 * @property QueryUpgradeTask $queryUpgradeTask 查询指定升级任务详情
 * @property QueryUpgradeSubTasks $queryUpgradeSubTasks 查询指定升级任务的子任务详情
 * @property QueryUpgradeTasks $queryUpgradeTasks 查询升级任务列表
 */
class Client extends BaseClient
{
}