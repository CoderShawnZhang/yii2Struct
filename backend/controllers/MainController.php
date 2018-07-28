<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/7/27
 * Time: 下午3:43
 */

namespace backend\controllers;


use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }
}