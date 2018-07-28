<?php

namespace backend\widgets\leftTree;

use yii\base\Widget;
/**
 * 菜单导航小部件
 */

class leftTree extends Widget
{
    public $menu;
    public $viewName;
    private $menuArr = [];

    public function init()
    {
        parent::init();
        if(!empty($this->menu)){
            $this->menuArr = $this->menu;
        }
    }
    public function run()
    {
        return $this->render($this->viewName);
    }
}