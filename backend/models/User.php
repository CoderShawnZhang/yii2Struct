<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/7/24
 * Time: 上午10:02
 */

namespace backend\models;


use backend\Querys\UserQuery;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules(){
        return [];
    }

    public static function find(){
        return new UserQuery(get_called_class());
    }
}