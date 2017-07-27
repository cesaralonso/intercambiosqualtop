<?php
class Categoria{

    public $idcategoria;
    public $nombre;

    function __construct() {
        $this->idcategoria = 0;
        $this->nombre = "";
    }

    function getIdequipo() {
        return $this->idcategoria;
    }

    function getNombre() {
        return $this->nombre;
    }


    function setIdcategoria($idcategoria) {
        $this->idcategoria = $idcategoria;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}
