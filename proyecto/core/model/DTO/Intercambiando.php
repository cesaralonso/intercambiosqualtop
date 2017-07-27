<?php
class Intercambiando{

    public $idintercambiando;
    public $articulo_idarticulo;
    public $idusuario_has_equipo_da;
    public $idusuario_has_equipo_recibe;

    function __construct() {
        $this->idintercambiando = 0;
        $this->articulo_idarticulo = 0;
        $this->idusuario_has_equipo_da = 0;
        $this->idusuario_has_equipo_recibe = 0;
    }

    function getIdintercambio() {
        return $this->idintercambiando;
    }

    function getArticuloIdarticulo() {
        return $this->articulo_idarticulo;
    }


    function getIdusuarioHasEquipoDa() {
        return $this->idusuario_has_equipo_da;
    }

    function getIdusuarioHasEquipoRecibe() {
        return $this->idusuario_has_equipo_recibe;
    }



    function setIdintercambio($idintercambiando) {
        $this->idintercambiando = $idintercambiando;
    }

    function setArticuloIdarticulo($articulo_idarticulo) {
        $this->articulo_idarticulo = $articulo_idarticulo;
    }

    function setIdusuarioHasEquipoDa($idusuario_has_equipo_da) {
        $this->idusuario_has_equipo_da = $idusuario_has_equipo_da;
    }

    function setIdusuarioHasEquipoRecibe($idusuario_has_equipo_recibe) {
        $this->idusuario_has_equipo_recibe = $idusuario_has_equipo_recibe;
    }


}
