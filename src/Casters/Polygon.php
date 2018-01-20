<?php

namespace Gregoriohc\Castable\Casters;

/**
 * Polygon caster
 *
 * Set values:
 * - Array of multiple float numbers. Ex.: [12.345, 67.890, 12.345, 67.890]
 * - \Spinen\Geometry\Geometries\Polygon object
 *
 * Get values:
 * - \Spinen\Geometry\Geometries\Polygon object
 *
 * Database accepted types:
 * - Polygon
 */
class Polygon extends Geometry
{
}
