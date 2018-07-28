<?php

namespace app\Service\Menu\Models\Tables;

/**
 * 菜单模型
 */
use app\Service\Menu\Querys\MenuQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $state
 */
class Menu extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'state'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'state' => 'State',
        ];
    }

    /**
     * @return Menu|\yii\db\ActiveQuery
     */
    public static function find()
    {
        return new MenuQuery(get_called_class());
    }
}
