<?php

namespace Gregoriohc\Castable\Casters;

/**
 * LineString caster
 *
 * Set values:
 * - Array of multiple float numbers. Ex.: [12.345, 67.890, 12.345, 67.890]
 * - \Spinen\Geometry\Geometries\LineString object
 *
 * Get values:
 * - \Spinen\Geometry\Geometries\LineString object
 *
 * Database accepted types:
 * - LineString
 */
class LineString extends Geometry
{
}
