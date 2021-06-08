<?php

namespace Gregoriohc\Castable\Types;

use Illuminate\Contracts\Support\Arrayable;

abstract class Geometry implements Arrayable
{
    /**
     * @var array
     */
    protected $coordinates;

    /**
     * @var \Spinen\Geometry\Support\GeometryProxy
     */
    protected $proxyGeometry;

    /**
     * Geometry constructor.
     * @param array $coordinates
     */
    public function __construct($coordinates)
    {
        $this->coordinates = $coordinates;
        $this->updateGeometryFromCoordinates();
    }

    /**
     * @return $this
     */
    private function updateGeometryFromCoordinates()
    {
        $this->proxyGeometry = \Geo::parseJson(json_encode([
            'type' => class_basename($this),
            'coordinates' => $this->coordinates,
        ]));

        return $this;
    }

    /**
     * @return array
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param array $coordinates
     * @return $this
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
        $this->updateGeometryFromCoordinates();

        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    function __call($name, $arguments)
    {
        return call_user_func_array([$this->proxyGeometry, $name], $arguments);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->proxyGeometry->toArray();
    }


}
