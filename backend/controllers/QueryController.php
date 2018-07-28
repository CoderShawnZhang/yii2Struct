<?php
/**
 * 查询构建器
 */

namespace backend\controllers;


use yii\web\Controller;

class QueryController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }
}