<?php

namespace backend\Helper\tool;

/**
 * 菜单工具类
 */

class MenuTool
{
    /**
     * 返回top菜单常量设置
     */
    public static function getMenuConst(){
        return [
            ['name'=>'新增菜单','url'=>'menu/add-view'],
            ['name'=>'菜单列表','url'=>'menu/index'],
            ['name'=>'123','url'=>'aaaa'],
            ['name'=>'123','url'=>'aaaa'],
            ['name'=>'123','url'=>'aaaa']
        ];
    }
}