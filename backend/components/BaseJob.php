<?php
/**
 * Created by PhpStorm.
 * User: loong
 * Date: 2018/1/9
 * Time: 09:30
 */

namespace backend\components;

use Yii;

use yii\queue\RetryableJobInterface;

class BaseJob implements RetryableJobInterface
{


    public $url;//存储的json格式键名，为方便获取，会定义成属性
    public $file;


    public function __construct($array)
    {
        $this->url = $array['url'];

        $this->file = $array['file'];

        return $this;
    }

    //这个函数是必须要有的因为接口的实现，这里的函数是在队列入队执行的
    public function execute($queue)
    {
        echo '我正在执行队列。。。';
        var_dump($this);
        file_put_contents($this->file, file_get_contents($this->url));
    }
    //这个是对队列任务的延迟设置
    public function getTtr()
    {
        echo 'ttr';
        return 15 * 60;
    }
    //设置任务的延迟重复
    public function canRetry($attempt, $error)
    {
        echo 'can try';
        return ($attempt < 5) && ($error );
    }


}