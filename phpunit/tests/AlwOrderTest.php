<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/7/28
 * Time: 下午2:41
 */
use PHPUnit\Framework\TestCase;

class AlwOrderTest extends TestCase
{
    public function testEmpty(){
        $stack = [];
        $this->assertEmpty($stack);
        return $stack;
    }
}