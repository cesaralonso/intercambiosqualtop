<?php
class UsuarioLikeUsuarioArticulo{

    public $idusuario_like_usuario_articulo;
    public $usuario_idusuario_vota;
    public $articulo_idarticulo;
    public $usuario_idusuario_votado;

    function __construct() {
        $this->idusuario_like_usuario_articulo = 0;
        $this->usuario_idusuario_vota = 0;
        $this->articulo_idarticulo = 0;
        $this->usuario_idusuario_votado = 0;
    }

    function getIdusuarioLikeUsuarioArticulo() {
        return $this->idusuario_like_usuario_articulo;
    }

    function getUsuarioIdusuarioVota() {
        return $this->usuario_idusuario_vota;
    }

    function getArticuloIdarticulo() {
        return $this->articulo_idarticulo;
    }

    function getUsuarioIdusuarioVotado() {
        return $this->usuario_idusuario_votado;
    }



    function setIdusuarioLikeUsuarioArticulo($idusuario_like_usuario_articulo) {
        $this->idusuario_like_usuario_articulo = $idusuario_like_usuario_articulo;
    }

    function setUsuarioIdusuarioVota($usuario_idusuario_vota) {
        $this->usuario_idusuario_vota = $usuario_idusuario_vota;
    }

    function setArticuloIdarticulo($articulo_idarticulo) {
        $this->articulo_idarticulo = $articulo_idarticulo;
    }

    function setUsuarioIdusuarioVotado($usuario_idusuario_votado) {
        $this->usuario_idusuario_votado = $usuario_idusuario_votado;
    }


}
