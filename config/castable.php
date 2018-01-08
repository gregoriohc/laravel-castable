<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Attribute casters
    |--------------------------------------------------------------------------
    |
    | The available attribute casters
    |
    */

    'casters' => [
        'point' => \Gregoriohc\Castable\Casters\Point::class,
        'multipoint' => \Gregoriohc\Castable\Casters\MultiPoint::class,
        'linestring' => \Gregoriohc\Castable\Casters\LineString::class,
        'multilinestring' => \Gregoriohc\Castable\Casters\MultiLineString::class,
        'polygon' => \Gregoriohc\Castable\Casters\Polygon::class,
        'multipolygon' => \Gregoriohc\Castable\Casters\MultiPolygon::class,
        'geometrycollection' => \Gregoriohc\Castable\Casters\GeometryCollection::class,
    ],

];
