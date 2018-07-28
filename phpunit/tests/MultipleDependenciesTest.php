<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/7/28
 * Time: 下午2:50
 */
use PHPUnit\Framework\TestCase;
class MultipleDependenciesTest extends TestCase
{
    public function testProducerFirst(){
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond(){
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer(){
        $this->assertEquals(['first','second'],func_get_args());
    }
}