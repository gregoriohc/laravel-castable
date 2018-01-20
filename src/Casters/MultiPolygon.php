<?php

namespace Gregoriohc\Castable\Casters;

/**
 * MultiPolygon caster
 *
 * Set values:
 * - Array of arrays of multiple float numbers. Ex.: [[12.345, 67.890, 12.345, 67.890], [67.890, 12.345, 67.890, 12.345]]
 * - \Spinen\Geometry\Geometries\MultiPolygon object
 *
 * Get values:
 * - \Spinen\Geometry\Geometries\MultiPolygon object
 *
 * Database accepted types:
 * - MultiPolygon
 */
class MultiPolygon extends Geometry
{
}
