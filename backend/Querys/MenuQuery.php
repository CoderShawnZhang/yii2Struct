<?php
/**
 * 查询构建器
 */

namespace backend\Querys;

use backend\models\Menu;
use yii\db\ActiveQuery;

class MenuQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function isActive(){
        return $this->andWhere(['state'=>Menu::MENU_STATE_ACTIVE]);
    }

    /**
     * @return $this
     */
    public function noActive(){
        return $this->andWhere(['state'=>Menu::MENU_STATE_NO_ACTIVE]);
    }
}