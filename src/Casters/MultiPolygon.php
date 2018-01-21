<?php

namespace Gregoriohc\Castable\Casters;

/**
 * MultiPolygon caster
 *
 * Set values:
 * - Array of array of arrays of two float numbers. Ex.: [[[12.345, 67.890], [34.345, 89.890]], [[12.345, 67.890], [34.345, 89.890]]]
 * - \Gregoriohc\Castable\Types\MultiPolygon object
 *
 * Get values:
 * - \Gregoriohc\Castable\Types\MultiPolygon object
 *
 * Database accepted types:
 * - MultiPolygon
 */
class MultiPolygon extends GeometryCaster
{
}
