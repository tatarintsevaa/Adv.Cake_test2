<?php

use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{
    public function testFlipperRus(): void
    {
        $str = 'Тевирп! Онвад ен ьсиледив.';
        $this->assertEquals($str, Flipper::flipTheWords('Привет! Давно не виделись.'));
    }

    public function testFlipperEng(): void
    {
        $str = 'Olleh Navi! Woh era uoy?';
        $this->assertEquals($str, Flipper::flipTheWords('Hello Ivan! How are you?'));
    }
}