<?php
namespace backend\controllers;

use backend\models\Menu;
use backend\models\User;
use Yii;
use yii\web\Controller;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $menu = Menu::find()->isActive()->all();
        $navHtml = '';
        foreach($menu as $key=>$val){
            $navHtml .='<li><a href ="'.$val['url'].'">'.$val['name'].'</a></li>';
        }
        return $this->render('index',['navHtml'=>$navHtml]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,'rand' => 123,
            ]);
        }
    }

    public function actionTest(){

        User::find()->active(1)->all();

        return $this->render('test');
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSay($message){
        return $this->render('say',['message'=>$message]);
    }
}
