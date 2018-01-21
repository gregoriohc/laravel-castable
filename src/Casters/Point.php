<?php

namespace Gregoriohc\Castable\Casters;

/**
 * Point caster
 *
 * Set values:
 * - Array of two float numbers. Ex.: [12.345, 67.890]
 * - \Gregoriohc\Castable\Types\Point object
 *
 * Get values:
 * - \Gregoriohc\Castable\Types\Point object
 *
 * Database accepted types:
 * - Point
 */
class Point extends GeometryCaster
{
}
