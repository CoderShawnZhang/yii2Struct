<?php
/**
 * 商品管理
 */

namespace backend\controllers;


use yii\web\Controller;
use Yii;

class GoodsController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }
}