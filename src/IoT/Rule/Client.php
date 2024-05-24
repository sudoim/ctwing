<?php

namespace Sudoim\CTWing\IoT\Rule;

use Sudoim\CTWing\IoT\Kernel\BaseClient;
use Sudoim\CTWing\IoT\Rule\Action\CreateRule;
use Sudoim\CTWing\IoT\Rule\Action\DeleteRule;
use Sudoim\CTWing\IoT\Rule\Action\QueryRule;
use Sudoim\CTWing\IoT\Rule\Action\UpdateRule;
use Sudoim\CTWing\IoT\Rule\Action\UpdateRulesStatus;
use Sudoim\CTWing\IoT\Rule\Action\UpdateRuleStatus;

/**
 * @property CreateRule $createRule 创建规则
 * @property UpdateRule $updateRule 修改规则
 * @property DeleteRule $deleteRule 删除规则
 * @property QueryRule $queryRule 查找规则
 * @property UpdateRuleStatus $updateRuleStatus 修改规则状态
 * @property UpdateRulesStatus $updateRulesStatus 批量修改规则状态
 */
class Client extends BaseClient
{
}