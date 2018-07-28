<?php

namespace backend\controllers;

/**
 * 菜单管理控制器
 *
 * 业务逻辑处理都在Service下Modules服务模块类里，
 * 模型数据处理在Service下Models模型里
 */

use app\Service\Menu\Exception\MenuException;
use app\Service\Menu\Menu as ServiceMenu;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;
use yii\web\Response;

class MenuController extends Controller
{
    public function init(){
        $this->enableCsrfValidation = false;
    }
    /**
     * 显示菜单
     *
     * @return string
     */
    public function actionIndex(){
        return $this->render('index');
    }

    /**
     * 异步返回菜单数据
     *
     * @return string
     */
    public function actionUser(){
        $data = Yii::$app->request->get();
        $page = ArrayHelper::getValue($data,'page',1);
        $limit = ArrayHelper::getValue($data,'limit',10);
        $menu = ServiceMenu::menuService()->menuList($page,$limit);
        $menuCount = ServiceMenu::menuService()->menuCount();
        $data = [];
        foreach($menu as $key=>$val){
            $data[] = ['id'=>$val['id'],'name'=>$val['name'],'url'=>$val['url'],'state'=>$val['state'],
                'lock'=>$val['lock']];
        }
        $result = ['code'=>0,'msg'=>'','count'=>$menuCount,'data'=>$data];
        return json_encode($result);
    }

    /**
     * 渲染新增菜单页面
     *
     * @return string
     */
    public function actionAddView(){
        return $this->render('add');
    }

    /**
     * 渲染编辑菜单页面
     *
     * @return string
     */
    public function actionEditView(){
        $data = Yii::$app->request->get();
        $id = ArrayHelper::getValue($data,'id');
        $model = ServiceMenu::menuService()->getDetail($id);
        return $this->render('edit',
            ['model'=>$model]
        );
    }

    /**
     * 新增菜单
     *
     * @return array
     */
    public function actionAdd(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();
        if(empty($data['name']) || empty($data['url'])){
           return ['result'=>false,'msg'=>'参数不能为空！'];
        }
        try{
            ServiceMenu::menuService()->checkMenuNameExist($data['name']);
            ServiceMenu::menuService()->add($data);
            return ['result'=>true,'msg'=>'新增成功！'];
        }catch (MenuException $e){
            return ['result'=>false,'msg'=>$e->getMessage()];
        }
    }

    /**
     * 更新菜单
     *
     * @return array
     */
    public function actionEdit(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();
        $state = ArrayHelper::getValue($data,'state',0);
        $lock = ArrayHelper::getValue($data,'lock',0);
        if(empty($data['name']) || empty($data['url'])){
            return ['result'=>false,'msg'=>'参数不能为空！'];
        }
        $data['state'] = $state == 'on' ? 1 : 0;
        $data['lock'] = $lock == 'on' ? 1 : 0;
        try{
            ServiceMenu::menuService()->edit($data);
            return ['result'=>true,'msg'=>'更新成功！'];
        }catch (MenuException $e){
            return ['result'=>false,'msg'=>$e->getMessage()];
        }
    }

    /**
     * 删除菜单
     *
     * @return array
     */
    public function actionDelMenu(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();
        $menuIdArr = ArrayHelper::map($data['data'],'id','id');
        $menuIds = array_keys($menuIdArr);
        $condition['id'] = $menuIds;
        try{
            $result =  ServiceMenu::menuService()->delMenu($condition);
            return ['result'=>$result,'msg'=>$result ? MenuException::MENU_MSG_DEL_SUCCESS :
                MenuException::MENU_MSG_DEL_FAIL];
        }catch (\Exception $e){
            return ['result' => false,'msg'=>$e->getMessage()];
        }
    }

    /**
     * 更新菜单可用状态
     *
     * @return array
     */
    public function actionChangeState(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();
        $id = ArrayHelper::getValue($data,'id','');
        $state = ArrayHelper::getValue($data,'state','false');
        $condition['id'] = $id;
        $update['state'] = $state == 'true' ? 1 : 0;
        try{
            $result = ServiceMenu::menuService()->changeState($condition,$update);
            $message = $update['state'] == 1 ? MenuException::MENU_MSG_STATE_OPEN : MenuException::MENU_MSG_LOCK_CLOSE;
            return ['result'=>$result,'msg'=>$result ? $message : MenuException::MENU_MSG_OPTION_ERROR];
        }catch (\Exception $e){
            return ['result' => false,'msg'=>$e->getMessage()];
        }
    }

    /**
     * 更新菜单锁定状态
     *
     * @return array
     */
    public function actionChangeLock(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();
        $id = ArrayHelper::getValue($data,'id','');
        $lock = ArrayHelper::getValue($data,'state','false');
        $condition['id'] = $id;
        $update['lock'] = $lock == 'true' ? 1 : 0;
        try{
            $result = ServiceMenu::menuService()->changeLock($condition,$update);
            $message = $update['lock'] == 1 ? MenuException::MENU_MSG_LOCK_OPEN : MenuException::MENU_MSG_LOCK_CLOSE;
            return ['result' => $result,'msg'=>$result ? $message : MenuException::MENU_MSG_OPTION_ERROR];
        }catch (\Exception $e){
            return ['result' => false,'msg'=>$e->getMessage()];
        }
    }
}