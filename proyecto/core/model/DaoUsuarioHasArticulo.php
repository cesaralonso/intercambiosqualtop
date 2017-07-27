<?php
require_once 'DTO/Base.php';
require_once 'DTO/UsuarioHasArticulo.php';

class DaoUsuarioHasArticulo extends base{

    public $tableName="usuario_has_articulo";

    public function add(UsuarioHasArticulo $x){
          $query=sprintf("INSERT INTO ".$this->tableName." (usuario_idusuario, articulo_idarticulo, promedio) VALUES (%s, %s, %s)",
          $this->GetSQLValueString($x->getUsuarioIdusuario(), "int"),
          $this->GetSQLValueString($x->getArticuloIdarticulo(), "int"),
          $this->GetSQLValueString($x->getPromedio(), "int"));
          $Result1=$this->_cnn->query($query);
            if(!$Result1) {
                 return false;
            }else{
               return $this->_cnn->insert_id;
          }
    }

    public function getAll(){
        $query = "SELECT * FROM ".$this->tableName;
        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }

    public function update(UsuarioHasArticulo $x){
          $query=sprintf("UPDATE ".$this->tableName." SET usuario_idusuario=%s, articulo_idarticulo=%s, promedio=%s WHERE idusuario_has_articulo = %s",
          $this->GetSQLValueString($x->getUsuarioIdusuario(), "int"),
          $this->GetSQLValueString($x->getArticuloIdarticulo(), "int"),
          $this->GetSQLValueString($x->getPromedio(), "int"),
          $this->GetSQLValueString($x->getIdusuarioHasArticulo(), "int"));
          $Result1=$this->_cnn->query($query);
          if(!$Result1) {
                  return false;
            }else{
                  return $x->getUsuarioIdusuario();
          }
    }


    public function delete(UsuarioHasArticulo $x){
        $query=sprintf("DELETE FROM ".$this->tableName." WHERE idusuario_has_articulo=%s",
        $this->GetSQLValueString($x->getIdusuario(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function deleteByUserIdAndArticuloId(UsuarioHasArticulo $x){
        $query=sprintf("DELETE FROM ".$this->tableName." WHERE usuario_idusuario=%s AND articulo_idarticulo=%s",
        $this->GetSQLValueString($x->getUsuarioIdusuario(), "int"),
        $this->GetSQLValueString($x->getArticuloIdarticulo(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    
    public function deleteByIdUsuario(UsuarioHasArticulo $x){
        $query=sprintf("DELETE FROM ".$this->tableName." WHERE usuario_idusuario=%s",
        $this->GetSQLValueString($x->getUsuarioIdusuario(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function getCountByIdusuarioIdarticulo(UsuarioHasArticulo $x){
        $query=sprintf("SELECT count(*) as count FROM ".$this->tableName." WHERE usuario_idusuario=%s",
        $this->GetSQLValueString($x->getUsuarioIdusuario(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
              return $this->advancedQuery($query);
        }
    }

    public function getById($Id){
        $query="SELECT * FROM ".$this->tableName." WHERE idusuario_has_articulo= ".$Id;
            $Result1=$this->_cnn->query($query);
            if(!$Result1){
                throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                return $this->createObject($Result1->fetch_assoc());
            }
    }

    public function createObject($row){
        $x = new UsuarioHasArticulo();
        $x->setIdusuarioHasArticulo($row['idusuario_has_articulo']);
        $x->setUsuarioIdusuario($row['usuario_idusuario']);
        $x->setArticuloIdarticulo($row['articulo_idarticulo']);
        $x->setPromedio($row['promedio']);
        return $x;
    }

}
