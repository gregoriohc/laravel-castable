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
    ],

];
