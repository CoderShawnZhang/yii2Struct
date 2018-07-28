<?php
/**
 * 订单类型-模型
 */

namespace app\Service\Orders\Models;


use app\Service\Orders\Models\Table\OrderType;

class OrderTypeModels extends OrderType
{
    public static function add($data){
        $model = new self();
        if(!$model->load($data,'')){

        }
        return $model;
    }
}