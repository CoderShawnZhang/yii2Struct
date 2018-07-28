<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/7/27
 * Time: 下午4:43
 */

namespace api\modules\v1\controllers;


use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actions()
    {
        $action= parent::actions(); // TODO: Change the autogenerated stub
        unset($action['index']);
        unset($action['create']);
        unset($action['update']);
        unset($action['delete']);
    }

    public function actionIndex(){
        return 123;
    }
}