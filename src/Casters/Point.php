<?php

namespace Gregoriohc\Castable\Casters;

/**
 * Point caster
 *
 * Set values:
 * - Array of two float numbers. Ex.: [12.345, 67.890]
 * - \Spinen\Geometry\Geometries\Point object
 *
 * Get values:
 * - \Spinen\Geometry\Geometries\Point object
 *
 * Database accepted types:
 * - Point
 */
class Point extends Geometry
{
}
