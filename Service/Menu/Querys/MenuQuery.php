<?php

namespace app\Service\Menu\Querys;

/**
 * 菜单查询生成器
 */
use app\Service\Menu\Menu as ServiceMenu;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Menu]].
 *
 * @see Menu
 */
class MenuQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function isActive()
    {
        return $this->andWhere(['state' => ServiceMenu::MENU_STATE_ACTIVE]);
    }

    /**
     * @return $this
     */
    public function noActive(){
        return $this->andWhere(['state' => ServiceMenu::MENU_STATE_NO_ACTIVE]);
    }

    /**
     * @param null $db
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @param null $db
     *
     * @return array|null|\yii\db\ActiveRecord
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
