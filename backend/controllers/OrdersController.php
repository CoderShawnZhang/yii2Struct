<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/7/27
 * Time: 下午3:01
 */

namespace backend\controllers;

use yii\web\Controller;
use app\Service\Orders\Orders as ServiceOrders;
use Yii;

class OrdersController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionList(){
        $data = Yii::$app->request->get('key');
        $list = ServiceOrders::orderService()->getList($data);
        return json_encode($list);
    }
}