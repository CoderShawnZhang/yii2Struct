<?php
namespace backend\components\Service;
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/7/4
 * Time: 下午5:27
 */
use backend\components\classFile\MyClass;

class CreateObj
{
    const SAY_HELLO = 'say_hello';

    public static function createMyClass1(){
        $component = new MyClass(1,2,['prop1' => 3,'prop2' => 4]);
        self::bindEvent($component);
        return $component;
    }

    public static function createMyClass2(){
        $component = \Yii::createObject(['class'=>MyClass::className(),'prop1'=>3,'prop2'=>4],[1,2]);
        return $component;
    }

    public static function bindEvent(MyClass $component){
        $component->on(self::SAY_HELLO,['backend\components\classFile\MyEventClass','eventGetName']);
    }

    public static function triggerEvent(MyClass $component){
        $component->trigger(self::SAY_HELLO);
    }
}