<?php

namespace Gregoriohc\Castable\Casters;

/**
 * Polygon caster
 *
 * Set values:
 * - Array of arrays of two float numbers. Ex.: [[12.345, 67.890], [34.345, 89.890]]
 * - \Gregoriohc\Castable\Types\Polygon object
 *
 * Get values:
 * - \Gregoriohc\Castable\Types\Polygon object
 *
 * Database accepted types:
 * - Polygon
 */
class Polygon extends GeometryCaster
{
}
