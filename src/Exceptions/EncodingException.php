<?php

namespace Gregoriohc\Castable\Exceptions;

use RuntimeException;

class EncodingException extends RuntimeException
{
    /**
     * Create a new encoding exception for an attribute.
     *
     * @param  mixed  $model
     * @param  mixed  $key
     * @param  string $message
     * @return static
     */
    public static function forAttribute($model, $key, $message)
    {
        $class = get_class($model);

        return new static("Unable to encode attribute [{$key}] for model [{$class}]: {$message}.");
    }
}
