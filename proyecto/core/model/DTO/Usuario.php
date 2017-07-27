<?php
class Usuario{

    public $idusuario;
    public $email;
    public $password;
    public $nombres;
    public $apellidos;
    public $avatar;
    public $rol_idrol;
    public $estatus;
    public $participa;

    function __construct() {
        $this->idusuario = "";
        $this->nombres = "";
        $this->email = "";
        $this->password = "";
        $this->apellidos = "";
        $this->avatar = "";
        $this->rol_idrol = "";
        $this->estatus = "";
        $this->participa = "";
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getAvatar() {
        return $this->avatar;
    }

    function getRolIdrol() {
        return $this->rol_idrol;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function getParticipa() {
        return $this->participa;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    function setRolIdrol($rol_idrol) {
        $this->rol_idrol = $rol_idrol;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

    function setParticipa($participa) {
        $this->participa = $participa;
    }

}
