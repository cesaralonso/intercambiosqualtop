<?php
class UsuarioHasArticulo{

    public $idusuario_has_articulo;
    public $usuario_idusuario;
    public $articulo_idarticulo;
    public $promedio;

    function __construct() {
        $this->idusuario_has_articulo = 0;
        $this->usuario_idusuario = 0;
        $this->articulo_idarticulo = 0;
        $this->promedio = 0;
    }

    function getIdusuarioHasArticulo() {
        return $this->idusuario_has_articulo;
    }

    function getUsuarioIdusuario() {
        return $this->usuario_idusuario;
    }

    function getArticuloIdarticulo() {
        return $this->articulo_idarticulo;
    }

    function getPromedio() {
        return $this->promedio;
    }



    function setIdusuarioHasArticulo($idusuario_has_articulo) {
        $this->idusuario_has_articulo = $idusuario_has_articulo;
    }

    function setUsuarioIdusuario($usuario_idusuario) {
        $this->usuario_idusuario = $usuario_idusuario;
    }

    function setArticuloIdarticulo($articulo_idarticulo) {
        $this->articulo_idarticulo = $articulo_idarticulo;
    }

    function setPromedio($promedio) {
        $this->promedio = $promedio;
    }


}
