<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/10/21
 * Time: 上午9:01
 */

namespace backend\models;


use yii\db\ActiveRecord;

class Seller extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%seller}}';
    }

    public function rules()
    {
        return [
            [['name', 'gender','student_number','mobile','if_alipay','if_present','if_big','sell_time'], 'required'],
            ['name', 'string','length'=>[1,5]],
            ['student_number', 'number','min'=>0,'max'=>9999999999],
            ['mobile', 'number','min'=>0,'max'=>99999999999],
        ];
    }

    public function attributeLabels() {
        parent::attributeLabels();
        return
            [
                'name'=>'姓名',
                'gender'=>'性别',
                'qq'=>'qq(选填)',
                'wechat'=>"微信(选填)",
                'student_number'=>'学生号',
                'major'=>'专业(选填)',
                'grade'=>'年级(选填)',
                'mobile'=>'手机号码',
                'if_big'=>'是否有大件商品',
                'if_present'=>'6.3号当天是否能亲自到场摆摊',
                'if_agent'=>'是否同意将书籍放入书籍专区，由工作人员售出',
                'if_together'=>'是否同意与他人合摊',
                'if_alipay'=>'是否同意用支付宝付款',
                'if_donate'=>'是否同意将未售出物品捐赠',
                'sell_time'=>'摆摊时间',
            ];
    }
}