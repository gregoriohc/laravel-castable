<?php

namespace Gregoriohc\Castable\Casters;

use Gregoriohc\Castable\Exceptions\DecodingException;
use Gregoriohc\Castable\Exceptions\EncodingException;
use \Gregoriohc\Castable\Types\Geometry;
use Illuminate\Database\Query\Expression;

abstract class GeometryCaster extends Caster
{
    /**
     * @param string $value
     * @return Geometry
     */
    public function as($value)
    {
        if ($value instanceof Geometry) {
            return $value;
        } elseif ($value instanceof Expression) {
            $value = substr($value->getValue(), 17, -2);

            /** @var \Spinen\Geometry\Support\GeometryProxy $proxy */
            $proxy = \Geo::parseWkt($value);

            $class = '\\Gregoriohc\\Castable\\Types\\' . class_basename($this);

            return new $class($proxy->toArray()['coordinates']);
        } elseif (is_string($value)) {
            $value = unpack("lsrid/H*wkb", $value);
            $value = pack('H*', $value['wkb']);

            /** @var \Spinen\Geometry\Support\GeometryProxy $proxy */
            $proxy = \Geo::parseWkb($value);

            $class = '\\Gregoriohc\\Castable\\Types\\' . class_basename($this);

            return new $class($proxy->toArray()['coordinates']);
        }

        throw DecodingException::forAttribute($this->model, $this->key, 'Unexpected value');
    }

    /**
     * @param Geometry|array $value
     * @return Geometry
     */
    public function from($value)
    {
        if ($value instanceof Geometry) {
            // Do nothing
        } elseif (is_array($value)) {
            $class = '\\Gregoriohc\\Castable\\Types\\' . class_basename($this);
            $value = new $class($value);
        } else {
            throw EncodingException::forAttribute($this->model, $this->key, 'Unexpected value');
        }

        return \DB::raw("ST_GeomFromText('" . $value->toWkt() . "')");
    }
}
