<?php

namespace Gregoriohc\Castable\Casters;

/**
 * MultiLineString caster
 *
 * Set values:
 * - Array of arrays of multiple float numbers. Ex.: [[12.345, 67.890, 12.345, 67.890], [67.890, 12.345, 67.890, 12.345]]
 * - \Spinen\Geometry\Geometries\MultiLineString object
 *
 * Get values:
 * - \Spinen\Geometry\Geometries\MultiLineString object
 *
 * Database accepted types:
 * - MultiLineString
 */
class MultiLineString extends Geometry
{
}
