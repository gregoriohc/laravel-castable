<?php

namespace Gregoriohc\Castable\Tests;

class PointTest extends BaseTest
{
    public function testCanCreatePoint()
    {
        $point = new \Gregoriohc\Castable\Types\Point([1,2]);

        $this->assertInstanceOf(\Gregoriohc\Castable\Types\Point::class, $point);
    }

    public function testCanGetPointCoordinates()
    {
        $point = new \Gregoriohc\Castable\Types\Point([1, 2]);

        $this->assertEquals($point->getCoordinates(), [1, 2]);
    }

    public function testCanSetPointCoordinates()
    {
        $point = new \Gregoriohc\Castable\Types\Point([1, 2]);
        $point->setCoordinates([3, 4]);

        $this->assertEquals($point->getCoordinates(), [3, 4]);
    }
}
