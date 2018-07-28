<?php

/**
 *
 */
namespace backend\models;

use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%orders}}';
    }

    public function rules()
    {
        return [];
    }

    public function attributeLabels()
    {
        return [

        ];
    }
}