<?php

namespace app\Service\Orders\Models\Table;

use \yii\db\ActiveRecord;

/**
 * This is the model class for table "order_type".
 *
 * @property int $id
 * @property int $orderType 订单类型
 * @property string $title 订单类型名称
 * @property string $type 订单标识
 * @property int $state 是否可用
 * @property int $created
 * @property int $modefied
 */
class OrderType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderType', 'state', 'created', 'modefied'], 'integer'],
            [['title'], 'string', 'max' => 20],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderType' => 'Order Type',
            'title' => 'Title',
            'type' => 'Type',
            'state' => 'State',
            'created' => 'Created',
            'modefied' => 'Modefied',
        ];
    }

    /**
     * @inheritdoc
     * @return OrderTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderTypeQuery(get_called_class());
    }
}
