<?php

namespace Gregoriohc\Castable\Tests;

class LineStringTest extends BaseTest
{
    public function testCanCreateLineString()
    {
        $linestring = new \Gregoriohc\Castable\Types\LineString([[1, 2], [3, 4]]);

        $this->assertInstanceOf(\Gregoriohc\Castable\Types\LineString::class, $linestring);
    }

    public function testCanGetLineStringCoordinates()
    {
        $lineString = new \Gregoriohc\Castable\Types\LineString([[1, 2], [3, 4]]);

        $this->assertEquals($lineString->getCoordinates(), [[1, 2], [3, 4]]);
    }

    public function testCanSetLineStringCoordinates()
    {
        $lineString = new \Gregoriohc\Castable\Types\LineString([[1, 2], [3, 4]]);
        $lineString->setCoordinates([[5, 6], [7, 8]]);

        $this->assertEquals($lineString->getCoordinates(), [[5, 6], [7, 8]]);
    }
}
