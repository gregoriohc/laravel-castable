<?php

namespace Gregoriohc\Castable\Casters;

/**
 * LineString caster
 *
 * Set values:
 * - Array of arrays of two float numbers. Ex.: [[12.345, 67.890], [34.345, 89.890]]
 * - \Gregoriohc\Castable\Types\LineString object
 *
 * Get values:
 * - \Gregoriohc\Castable\Types\LineString object
 *
 * Database accepted types:
 * - LineString
 */
class LineString extends GeometryCaster
{
}
