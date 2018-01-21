<?php

namespace Gregoriohc\Castable;

class CustomCastableModel extends \Illuminate\Database\Eloquent\Model
{
    use HasCustomCasts;

    protected function castAttribute($key, $value)
    {
        return $this->customCastAttribute($key, parent::castAttribute($key, $value));
    }

    public function setAttribute($key, $value)
    {
        return parent::setAttribute($key, $value)->customSetAttribute($key, $value);
    }

    public function toArray()
    {
        return $this->customToArray(parent::toArray());
    }
}
