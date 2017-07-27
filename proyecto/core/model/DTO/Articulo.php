<?php
class Articulo{

    public $idarticulo;
    public $nombre;
    public $precio_min;
    public $precio_max;

    function __construct() {
        $this->idarticulo = 0;
        $this->nombre = "";
        $this->precio_min = 0;
        $this->precio_max = 0;
    }

    function getIdarticulo() {
        return $this->idarticulo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecioMin() {
        return $this->precio_min;
    }

    function getPrecioMax() {
        return $this->precio_max;
    }


    function setIdarticulo($idarticulo) {
        $this->idarticulo = $idarticulo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecioMin($precio_min) {
        $this->precio_min = $precio_min;
    }

    function setPrecioMax($precio_max) {
        $this->precio_max = $precio_max;
    }


}
