<?php
class Intercambio{

    public $idintercambio;
    public $nombre;
    public $fecha_ini;
    public $fecha_fin;
    public $usuario_idusuario;
    public $estatus;

    function __construct() {
        $this->idintercambio = 0;
        $this->nombre = "";
        $this->fecha_ini = "";
        $this->fecha_fin = "";
        $this->usuario_idusuario = 0;
        $this->estatus = "";
    }

    function getIdintercambio() {
        return $this->idintercambio;
    }

    function getNombre() {
        return $this->nombre;
    }


    function getFechaIni() {
        return $this->fecha_ini;
    }

    function getFechaFin() {
        return $this->fecha_fin;
    }

    function getUsuarioIdusuario() {
        return $this->usuario_idusuario;
    }

    function getEstatus() {
        return $this->estatus;
    }



    function setIdintercambio($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


    function setFechaIni($fecha_ini) {
        $this->fecha_ini = $fecha_ini;
    }

    function setFechaFin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    function setUsuarioIdusuario($usuario_idusuario) {
        $this->usuario_idusuario = $usuario_idusuario;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

}
