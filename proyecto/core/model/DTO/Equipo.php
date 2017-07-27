<?php
class Equipo{

    public $idequipo;
    public $nombre;
    public $precio_min;
    public $precio_max;
    public $intercambio_idintercambio;
    public $code;
    public $articulos_max;

    function __construct() {
        $this->idequipo = 0;
        $this->nombre = "";
        $this->precio_min = 0;
        $this->precio_max = 0;
        $this->intercambio_idintercambio = 0;
        $this->code = "";
        $this->articulos_max = 0;
    }

    function getCode() {
        return $this->code;
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

    function getIntercambioIdintercambio() {
        return $this->intercambio_idintercambio;
    }

    function getArticulosMax() {
        return $this->articulos_max;
    }


    function setCode($code) {
        $this->code = $code;
    }

    function setIdequipo($idequipo) {
        $this->idequipo = $idequipo;
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

    function setIntercambioIdintercambio($intercambio_idintercambio) {
        $this->intercambio_idintercambio = $intercambio_idintercambio;
    }

    function setArticulosMax($articulos_max) {
        $this->articulos_max = $articulos_max;
    }


}
