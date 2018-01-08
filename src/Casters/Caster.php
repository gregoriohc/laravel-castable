<?php

namespace Gregoriohc\Castable\Casters;

abstract class Caster
{
    /**
     * @param mixed $value
     * return mixed
     */
    abstract public function as($value);

    /**
     * @param mixed $value
     * return mixed
     */
    abstract public function from($value);
}
