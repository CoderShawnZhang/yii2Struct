<?php

namespace backend\components;

/**
 * 自定义客户端验证
 * 在要验证的模型中使用：return [['username','backend\components\UsernameValidator']]
 */
use backend\models\Users;
use yii\validators\Validator;

class UsernameValidator extends Validator
{
    public function init(){
        parent::init();
        $this->message = '[自定义验证]无效的用户名';
    }

    public function validateAttributes($model, $attribute = null)
    {
        $value = $model->$attribute[0];  //username

        if(!Users::find()->where(['username'=>$value])->exists()){
            $model->addError($attribute,$this->message);
        }
    }

    public function clientValidateAttribute($model, $attribute, $view)
    {
        $statuses = json_encode(Users::find()->select('username')->asArray()->column());
        $message = json_encode($this->message);
        return <<<JS
if($.inArray(value,$statuses) === -1) {
    messages.push($message);
}
JS;
    }
}