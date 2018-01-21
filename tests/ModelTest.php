<?php

namespace Gregoriohc\Castable\Tests;

use Gregoriohc\Castable\Tests\Models\Dummy;

class ModelTest extends BaseTest
{
    public function testCanCreateModel()
    {
        $model = new Dummy();
        $this->assertTrue($model instanceof \Gregoriohc\Castable\CustomCastableModel);
    }


    public function testCanSetAttributes()
    {
        $model = new Dummy();

        $model->name = 'Test';
        $this->assertEquals($model->name, 'Test');

        $model->location = [1, 2];
        $this->assertInstanceOf(\Gregoriohc\Castable\Types\Point::class, $model->location);

        $model->location = new \Gregoriohc\Castable\Types\Point([1, 2]);
        $this->assertInstanceOf(\Gregoriohc\Castable\Types\Point::class, $model->location);

        $model->path = [[1, 2], [3, 4]];
        $this->assertInstanceOf(\Gregoriohc\Castable\Types\LineString::class, $model->path);

        $model->area = [[1, 2], [3, 4], [5, 6]];
        $this->assertInstanceOf(\Gregoriohc\Castable\Types\Polygon::class, $model->area);

        $model->other = 'Foo';
        $this->assertEquals($model->other, 'Foo');

        $model->other = null;
        $this->assertEquals($model->other, null);
    }

    public function testToArray()
    {
        $model = new Dummy();

        $model->name = 'Test';
        $this->assertEquals($model->name, 'Test');

        $model->location = [1, 2];
        $this->assertInstanceOf(\Gregoriohc\Castable\Types\Point::class, $model->location);

        $this->assertEquals($model->toArray(), [
            'name' => 'Test',
            'location' => [
                'type' => 'Point',
                'coordinates' => [1, 2],
            ],
        ]);
    }

    public function testFailSettingWrongAttributeValue()
    {
        $model = new Dummy();

        $this->expectException(\Gregoriohc\Castable\Exceptions\EncodingException::class);

        $model->location = 'Test';
    }

    public function testFailCasterClass()
    {
        $model = new Dummy();

        $this->expectException(\Gregoriohc\Castable\Exceptions\CasterException::class);

        config()->set('castable.casters.point', 'WrongClass');

        $model->location = 'Test';
    }

    public function testCastDatabaseAttributes()
    {
        $model = new Dummy();

        $location = \Geo::parse(json_encode([
            'type' => 'Point',
            'coordinates' => [1, 2],
        ]));

        $path = \Geo::parse(json_encode([
            'type' => 'LineString',
            'coordinates' => [[1, 2], [3, 4]],
        ]));

        $area = \Geo::parse(json_encode([
            'type' => 'Polygon',
            'coordinates' => [[1, 2], [3, 4], [5, 6]],
        ]));

        $model->setRawAttributes([
            'location' =>  "\x00\x00\x00\x00" . $location->toWkb(),
            'path' =>  "\x00\x00\x00\x00" . $path->toWkb(),
            'area' =>  "\x00\x00\x00\x00" . $area->toWkb(),
        ]);

        $this->assertInstanceOf(\Gregoriohc\Castable\Types\Point::class, $model->location);
        $this->assertInstanceOf(\Gregoriohc\Castable\Types\LineString::class, $model->path);
        $this->assertInstanceOf(\Gregoriohc\Castable\Types\Polygon::class, $model->area);
    }
}
