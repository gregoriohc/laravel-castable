<?php

namespace Gregoriohc\Castable\Exceptions;

use RuntimeException;

class DecodingException extends RuntimeException
{
    /**
     * Create a new decoding exception for an attribute.
     *
     * @param  mixed  $model
     * @param  mixed  $key
     * @param  string $message
     * @return static
     */
    public static function forAttribute($model, $key, $message)
    {
        $class = get_class($model);

        return new static("Unable to decode attribute [{$key}] for model [{$class}]: {$message}.");
    }
}
