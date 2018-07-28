<?php
namespace app\Service\Menu;

use app\Service\Menu\Modules\MenuModules;

class Menu
{
    const MENU_STATE_ACTIVE = 1;
    const MENU_STATE_NO_ACTIVE = 0;

    public static function menuService(){
        return new MenuModules();
    }
}