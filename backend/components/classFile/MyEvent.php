<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/7/5
 * Time: 下午4:08
 */

namespace backend\components\classFile;


use yii\base\Event;

class MyEvent extends Event
{
    public $author;
    public $content;
}