<?php
namespace backend\components\classFile;

use yii\base\Component;

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/7/4
 * Time: 下午5:25
 */

class MyClass extends Component
{
    public $prop1;
    public $prop2;

    private $_label;

    public function getLabel(){
        return $this->_label;
    }

    public function setLabel($value){
        $this->_label = $value;
    }

    public function __construct($param1,$param2,$config = []) {
        parent::__construct($config);
    }

    public function int(){
        parent::init();
    }

    public function abc($params = ''){
        if(!empty($params)){
            return $params;
        }
        return $this;
    }

    public function aa(){
        return 'aabbb';
    }


    public function h(){
        echo 3333;
    }
}