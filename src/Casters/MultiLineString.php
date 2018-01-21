<?php

namespace Gregoriohc\Castable\Casters;

/**
 * MultiLineString caster
 *
 * Set values:
 * - Array of array of arrays of two float numberss. Ex.: [[[12.345, 67.890], [34.345, 89.890]], [[12.345, 67.890], [34.345, 89.890]]]
 * - \Gregoriohc\Castable\Types\MultiLineString object
 *
 * Get values:
 * - \Gregoriohc\Castable\Types\MultiLineString object
 *
 * Database accepted types:
 * - MultiLineString
 */
class MultiLineString extends GeometryCaster
{
}
