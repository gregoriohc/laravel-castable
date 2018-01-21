<?php

namespace Gregoriohc\Castable\Casters;

/**
 * MultiPoint caster
 *
 * Set values:
 * - Array of arrays of two float numbers. Ex.: [[12.345, 67.890], [12.345, 67.890]]
 * - \Gregoriohc\Castable\Types\MultiPoint object
 *
 * Get values:
 * - \Gregoriohc\Castable\Types\MultiPoint object
 *
 * Database accepted types:
 * - MultiPoint
 */
class MultiPoint extends GeometryCaster
{
}
