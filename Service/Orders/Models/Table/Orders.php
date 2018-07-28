<?php

namespace app\Service\Orders\Models\Table;

use app\Service\Orders\Querys\OrdersQuery;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "orders".
 *
 * @property int $orderId 订单ID
 * @property string $orderSn 订单号
 * @property int $orderType 订单类型
 * @property string $buyerName
 * @property string $buyerMobile
 * @property int $created
 * @property int $modified
 * @property int $creater
 */
class Orders extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderType', 'created', 'modified', 'creater'], 'integer'],
            [['orderSn', 'buyerName'], 'string', 'max' => 20],
            [['buyerMobile'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orderId' => 'Order ID',
            'orderSn' => 'Order Sn',
            'orderType' => 'Order Type',
            'buyerName' => 'Buyer Name',
            'buyerMobile' => 'Buyer Mobile',
            'created' => 'Created',
            'modified' => 'Modified',
            'creater' => 'Creater',
        ];
    }

    /**
     * @inheritdoc
     * @return OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersQuery(get_called_class());
    }
}
