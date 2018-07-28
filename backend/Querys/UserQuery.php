<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/7/24
 * Time: 上午10:03
 */
namespace backend\Querys;

class UserQuery extends \yii\db\ActiveQuery
{
    public function active($state = 0){
        return $this->andOnCondition(['active'=>$state]);
    }
}