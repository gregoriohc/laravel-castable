<?php

namespace Gregoriohc\Castable\Tests;

use \Orchestra\Testbench\TestCase;

abstract class BaseTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Spinen\Geometry\GeometryServiceProvider::class,
            \Gregoriohc\Castable\ServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Geo' => \Spinen\Geometry\GeometryFacade::class,
        ];
    }
}
