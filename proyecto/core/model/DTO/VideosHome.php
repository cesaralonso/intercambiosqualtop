<?php
class VideosHome{
    
    public $id;
    public $ruta;
    public $nombre;
    public $descripcion;
    public $thumbnail;
    public $user_id;
    public $portada;
    public $seccion;
    
    function __construct() {
        $this->id = "";
        $this->ruta = "";
        $this->nombre = "";
        $this->descripcion = "";
        $this->thumbnail = "";
        $this->user_id = "";
        $this->portada = "";
        $this->seccion = "YOUTUBE";
    }
    
    function getUser_id() {
        return $this->user_id;
    }

    function getSeccion() {
        return $this->seccion;
    }

    function getId() {
        return $this->id;
    }

    function getRuta() {
        return $this->ruta;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getThumbnail() {
        return $this->thumbnail;
    }

    function getPortada() {
        return $this->portada;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
    }

    function setPortada($portada) {
        $this->portada = $portada;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    function setSeccion($seccion) {
        $this->seccion = $seccion;
    }



}
