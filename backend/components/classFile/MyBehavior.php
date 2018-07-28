<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/7/6
 * Time: 上午9:15
 */

namespace backend\components\classFile;


use yii\base\Behavior;
use yii\db\ActiveRecord;

class MyBehavior extends Behavior
{
    public $prop1;
    public $prop2;

    public function events()
    {
        return [
          ActiveRecord::EVENT_BEFORE_VALIDATE=>'sendMail'
        ];
    }

    public function sendMail($event){

    }

    public function getProp2(){
        return $this->prop2;
    }

    public function setProp2($value){
        return $this->prop2 = $value;
    }

    public function foo(){
        echo '--foo--';
    }
}