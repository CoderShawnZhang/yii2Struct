<?php
/**
 * 菜单模块服务层
 */
namespace app\Service\Menu\Modules;

use app\Service\Menu\Exception\MenuException;
use app\Service\Menu\Models\MenuModels;

class MenuModules
{
    /**
     * 返回menu菜单数据列表
     *
     * @param int $page
     * @param int $limit
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public function menuList($page=1,$limit=10){
        return MenuModels::getMenuList($page,$limit);
    }

    /**
     * @param $id
     *
     * @return int|string
     */
    public function getDetail($id){
        return MenuModels::getDetail($id);
    }
    /**
     * 返回菜单数量
     *
     * @return int|string
     */
    public function menuCount(){
        return MenuModels::getMenuCount();
    }
    /**
     * 返回menu菜单li列表
     *
     * @return string
     */
    public function getMenuLi(){
        $navHtml = '';
        $menu = $this->menuList();
        foreach($menu as $key=>$val){
            $navHtml .='<li><a href ="'.$val['url'].'">'.$val['name'].'</a></li>';
        }
        return $navHtml;
    }

    /**
     * 新增菜单
     *
     * @param $data
     *
     * @return MenuModels
     * @throws MenuException
     */
    public function add($data){
        try{
            $model = MenuModels::addMenu($data);
        }catch (\Exception $e){
            throw new MenuException($e->getMessage());
        }
        return $model;
    }

    /**
     * 更新菜单
     *
     * @param $data
     *
     * @return MenuModels
     * @throws MenuException
     */
    public function edit($data){
        try{
            $model = MenuModels::editMenu($data);
        }catch (\Exception $e){
            throw new MenuException($e->getMessage());
        }
        return $model;
    }

    /**
     * 删除菜单
     *
     * @param $condition
     *
     * @return bool
     * @throws MenuException
     */
    public function delMenu($condition){
        try{
            $model = MenuModels::delMenu($condition);
        }catch (\Exception $e){
            throw new MenuException($e->getMessage(),$e->getCode());
        }
        return $model;
    }

    /**
     * 检查菜单名称是否存在
     *
     * @param $name
     *
     * @return bool
     * @throws MenuException
     */
    public function checkMenuNameExist($name){
        $isExistName = MenuModels::getMenu($name);
        if($isExistName){
            throw new MenuException('该菜单名称已经存在！');
        }
        return true;
    }

    /**
     * 更新菜单可用状态
     *
     * @param array $condition
     * @param array $update
     *
     * @return bool
     * @throws MenuException
     */
    public function changeState($condition = [],$update = []){
        try{
           $model = MenuModels::updateMenu($condition,$update);
        }catch (\Exception $e){
            throw new MenuException($e->getMessage(),$e->getCode());
        }
        return $model;

    }

    /**
     * 更新菜单锁定状态
     *
     * @param array $condition
     * @param array $update
     *
     * @return bool
     * @throws MenuException
     */
    public function changeLock($condition = [],$update = []){
        try{
            $model = MenuModels::updateMenu($condition,$update);
        }catch (\Exception $e){
            throw new MenuException($e->getMessage(),$e->getCode());
        }
         return $model;
    }
}