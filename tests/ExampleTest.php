<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testAddingTwoPlusTwoResultsInFou()
    {
        $this->assertEquals(4, 2 + 2);
    }
}