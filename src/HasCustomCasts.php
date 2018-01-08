<?php

namespace Gregoriohc\Castable;

use Gregoriohc\Castable\Casters\Caster;

trait HasCustomCasts
{
    /**
     * @param string $key
     * @return bool
     */
    public function isCustomCastable($key)
    {
        return array_key_exists($key, $this->casts) && array_key_exists($this->casts[$key], config('castable.casters', []));
    }

    /**
     * @param string $key
     * @return Caster
     */
    public function getCustomCaster($key)
    {
        if (!$this->isCustomCastable($key)) {
            return null;
        }

        $casters = config('castable.casters', []);

        $caster = $casters[$this->casts[$key]];

        if (!class_exists($caster)) {
            return null;
        }

        return new $caster();
    }

    /**
     * Cast an attribute to a native PHP type.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function customCastAttribute($key, $value)
    {
        if (is_null($value)) {
            return $value;
        }

        if (!$this->isCustomCastable($key)) {
            return $value;
        }

        return $this->getCustomCaster($key)->as($value);
    }

    /**
     * Set a given attribute on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return $this
     */
    public function customSetAttribute($key, $value)
    {
        if ($this->isCustomCastable($key) && !is_null($value)) {
            $this->attributes[$key] = $this->getCustomCaster($key)->from($value);
        }

        return $this;
    }
}
