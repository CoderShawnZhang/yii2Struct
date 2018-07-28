<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/10/21
 * Time: 上午9:50
 */

namespace backend\models;


use yii\db\ActiveRecord;

class Settings extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%settings}}';
    }

    public function rules()
    {
        return [];
    }

    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'name' => '关键名',
            'value' => '关键值'
        ];
    }
}