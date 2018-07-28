<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/7/28
 * Time: 下午2:47
 */
use PHPUnit\Framework\TestCase;

class DependencyFailureTest extends TestCase
{
    public function testOne(){
        $this->assertTrue(true);
    }

    /**
     * @depends testOne
     */
    public function testTwo(){

    }
}