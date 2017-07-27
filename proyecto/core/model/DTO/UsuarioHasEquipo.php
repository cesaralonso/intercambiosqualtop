<?php
class UsuarioHasEquipo{

    public $idusuario_has_equipo;
    public $usuario_idusuario;
    public $equipo_idequipo;
    public $estatus_encuesta;

    function __construct() {
        $this->idusuario_has_equipo = 0;
        $this->usuario_idusuario = 0;
        $this->equipo_idequipo = 0;
        $this->estatus_encuesta = "";
    }

    function getIdusuarioHasEquipo() {
        return $this->idusuario_has_equipo;
    }

    function getUsuarioIdusuario() {
        return $this->usuario_idusuario;
    }

    function getEquipoIdequipo() {
        return $this->equipo_idequipo;
    }

    function getEstatusEncuesta() {
        return $this->estatus_encuesta;
    }



    function setIdusuarioHasEquipo($idusuario_has_equipo) {
        $this->idusuario_has_equipo = $idusuario_has_equipo;
    }

    function setUsuarioIdusuario($usuario_idusuario) {
        $this->usuario_idusuario = $usuario_idusuario;
    }

    function setEquipoIdequipo($equipo_idequipo) {
        $this->equipo_idequipo = $equipo_idequipo;
    }

    function setEstatusEncuesta($estatus_encuesta) {
        $this->estatus_encuesta = $estatus_encuesta;
    }


}
