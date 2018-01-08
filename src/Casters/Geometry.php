<?php

namespace Gregoriohc\Castable\Casters;

abstract class Geometry extends Caster
{
    /**
     * @param mixed $value
     * @return \Spinen\Geometry\Support\GeometryProxy
     */
    public function as ($value)
    {
        $value = unpack("lsrid/H*wkb", $value);
        $value = pack('H*',$value['wkb']);
        return \Geo::parseWkb($value);
    }

    /**
     * @param \Spinen\Geometry\Support\GeometryProxy|array $value
     * @return mixed
     */
    public function from($value)
    {
        if ($value instanceof \Spinen\Geometry\Support\GeometryProxy) {
            return $value->toWkt();
        } elseif (is_array($value)) {
            $value = [
                'type' => class_basename($this),
                'coordinates' => $value,
            ];
            return \DB::raw("ST_GeomFromText('" . \Geo::parse(json_encode($value), 'Json')->toWkt() . "')");
        }

        return $value;
    }
}
