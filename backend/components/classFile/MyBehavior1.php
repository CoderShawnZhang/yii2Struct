<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/7/6
 * Time: 上午9:46
 */

namespace backend\components\classFile;


use yii\base\Behavior;

class MyBehavior1 extends Behavior
{
    public function foo(){
        echo '==foo==';
    }
}