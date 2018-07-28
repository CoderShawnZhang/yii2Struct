<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/10/21
 * Time: 上午9:01
 */

namespace backend\models;


use yii\db\ActiveRecord;

class Goods extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%goods}}';
    }

    public function rules()
    {
        return [
            [['name','cate','number'],'required'],
            ['name','string','length'=>[1,10]],
            ['number','number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => '名称',
            'cate' => '种类',
            'number' => '数量',
            'sell_time' => '登记时间'
        ];
    }
}