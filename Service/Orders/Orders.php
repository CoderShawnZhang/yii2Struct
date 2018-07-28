<?php
/**
 * 订单管理服务层
 */

namespace app\Service\Orders;

use app\Service\Orders\Modules\OrdersModules;

class Orders
{
    public static function orderService(){
        return new OrdersModules();
    }
}