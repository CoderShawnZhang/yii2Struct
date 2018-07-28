<?php
/**
 * 订单模块服务层
 */

namespace app\Service\Orders\Modules;

use app\Service\Orders\Models\OrdersModels;

class OrdersModules
{
    public function getList($condition){
        return OrdersModels::getList($condition);
    }
}