<?php
/**
 * 订单服务层模型
 */

namespace app\Service\Orders\Models;

use app\Service\Orders\Models\Table\Orders;

class OrdersModels extends Orders
{
    /**
     * @param array $condition
     *
     * @return \app\Service\Orders\Orders[]|array
     */
    public static function getList($condition){
        $query = self::find();
        if(isset($condition['orderSn'])){
            $query->andFilterWhere(['like','orderSn',$condition['orderSn']]);
        }
        if(isset($condition['orderType'])){
            $query->andFilterWhere(['orderType'=>$condition['orderType']]);
        }
        $data = $query->asArray()->all();
        $list = ['code'=>0,'msg'=>'','count'=>10,'data'=>$data];
        return $list;
    }
}