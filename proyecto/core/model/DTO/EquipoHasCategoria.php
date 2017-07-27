<?php
class Equipo{

    public $idequipo;
    public $nombre;
    public $precio_min;
    public $precio_max;
    public $fecha_ini;
    public $fecha_fin;

    function __construct() {
        $this->idequipo = 0;
        $this->nombre = "";
        $this->precio_min = 0;
        $this->precio_max = 0;
        $this->fecha_ini = "";
        $this->fecha_fin = "";
    }

    function getIdequipo() {
        return $this->idequipo;
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

    function getFechaIni() {
        return $this->fecha_ini;
    }

    function getFechaFin() {
        return $this->fecha_fin;
    }


    function setIdequipo($id) {
        $this->id = $id;
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

    function setFechaIni($fecha_ini) {
        $this->fecha_ini = $fecha_ini;
    }

    function setFechaFin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

}
