<?php

namespace app\Service\Orders\Models\Table;

/**
 * This is the ActiveQuery class for [[OrderType]].
 *
 * @see OrderType
 */
class OrderTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OrderType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OrderType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
