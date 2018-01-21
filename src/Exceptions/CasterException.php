<?php

namespace Gregoriohc\Castable\Exceptions;

use RuntimeException;

class CasterException extends RuntimeException
{
    /**
     * Create a new class not exists exception.
     *
     * @param  string $class
     * @return static
     */
    public static function classNotExists($class)
    {
        return new static("Caster class [{$class}] does not exists.");
    }
}
