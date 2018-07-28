<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/8/12
 * Time: 下午3:43
 */
use PHPUnit\Framework\TestCase;

class AbcTest extends TestCase
{
    public function testEmpty(){
        $stack = [];
        $this->assertEmpty($stack);
        return $stack;
    }
}