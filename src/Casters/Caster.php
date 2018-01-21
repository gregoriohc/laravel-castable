<?php

namespace Gregoriohc\Castable\Casters;

abstract class Caster
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var \Illuminate\Database\Eloquent\Model|\Gregoriohc\Castable\HasCustomCasts
     */
    protected $model;

    /**
     * Caster constructor.
     * @param string $key
     * @param \Illuminate\Database\Eloquent\Model|\Gregoriohc\Castable\HasCustomCasts $model
     */
    public function __construct($key, $model)
    {
        $this->key = $key;
        $this->model = $model;
    }

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
