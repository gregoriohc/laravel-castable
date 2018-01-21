<?php

namespace Gregoriohc\Castable\Tests\Models;

use Gregoriohc\Castable\CustomCastableModel;

class Dummy extends CustomCastableModel
{
    protected $fillable = [
        'name',
        'location',
        'path',
        'area',
        'other',
    ];

    protected $casts = [
        'location' => 'point',
        'path' => 'linestring',
        'area' => 'polygon',
        'other' => 'missing',
    ];
}
