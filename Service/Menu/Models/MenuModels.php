<?php

namespace app\Service\Menu\Models;
/**
 * 菜单子模型
 */

use app\Service\Menu\Exception\MenuException;
use app\Service\Menu\Menu;
use app\Service\Menu\Models\Tables\Menu as MenuTable;
use app\Service\Menu\Querys\MenuQuery;
use yii\db\Exception;

class MenuModels extends MenuTable
{
    public static function find()
    {
        return new MenuQuery(get_called_class());
    }

    /**
     * 获取菜单列表
     *
     * @param int $page
     * @param int $limit
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getMenuList($page = 1,$limit = 10){
        var_dump(123);die;
        return self::find()->offset(($page-1)*$limit)->limit($limit)->all();
    }

    /**
     * 根据ID获取菜单详情
     * @param $id
     *
     * @return static
     */
    public static function getDetail($id){
        return self::findOne($id);
    }

    /**
     * 获取菜单数量
     *
     * @return int|string
     */
    public static function getMenuCount(){
        return self::find()->count();
    }

    /**
     * 新增菜单
     *
     * @param $data
     *
     * @return MenuModels
     * @throws MenuException
     */
    public static function addMenu($data){
        $data['state'] = Menu::MENU_STATE_ACTIVE;
        $menu = new self();
        if($menu->load($data,'')){
            if(!$menu->save()){
                throw new MenuException(implode(',',$menu->errors));
            };
            return $menu;
        }else{
            throw new MenuException(implode(',',$menu->getErrors()));
        }
    }

    /**
     * 更新菜单
     *
     * @param $data
     *
     * @return static
     * @throws MenuException
     */
    public static function editMenu($data){
        $menu = self::find()->where(['id'=>$data['id']])->one();
        if($menu->load($data,'')){
            if(!$menu->save()){
                throw new MenuException(implode(',',$menu->errors));
            }
            return $menu;
        }else{
            throw new MenuException(implode(',',$menu->getErrors()));
        }
    }

    /**
     * 删除菜单
     *
     * @param $condition
     *
     * @return bool
     */
    public static function delMenu($condition){
        $delRes = self::deleteAll($condition);
        if($delRes > 0){
            return true;
        }else{
            return false;
        }
    }
    /**
     * 根据菜单名称获取菜单
     *
     * @param $name
     *
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getMenu($name){
        return self::find()->where(['like','name',$name])->one();
    }

    /**
     * 更新菜单
     *
     * @param $condition
     * @param $update
     *
     * @return bool
     * @throws MenuException
     */
    public static function updateMenu($condition,$update){
        if(empty($condition)){
            return false;
        }
        try{
            $updateRes = self::updateAll($update,$condition);
            if($updateRes > 0){
                return true;
            }else{
                return false;
            }
        } catch (\Exception $e) {
            throw new MenuException($e->getMessage());
        }
    }
}