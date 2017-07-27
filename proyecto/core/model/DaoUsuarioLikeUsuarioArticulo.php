<?php
require_once 'DTO/Base.php';
require_once 'DTO/UsuarioLikeUsuarioArticulo.php';

class DaoUsuarioLikeUsuarioArticulo extends base{

    public $tableName="usuario_like_usuario_articulo";

    public function add(UsuarioLikeUsuarioArticulo $x){
          $query=sprintf("INSERT INTO ".$this->tableName." (usuario_idusuario_vota, usuario_idusuario_votado, articulo_idarticulo) VALUES (%s, %s, %s)",
          $this->GetSQLValueString($x->getUsuarioIdusuarioVota(), "int"),
          $this->GetSQLValueString($x->getUsuarioIdusuarioVotado(), "int"),
          $this->GetSQLValueString($x->getArticuloIdarticulo(), "int"));
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

    public function update(UsuarioLikeUsuarioArticulo $x){
          $query=sprintf("UPDATE ".$this->tableName." SET usuario_idusuario_vota=%s, usuario_idusuario_votado=%s, articulo_idarticulo=%s WHERE idusuario_like_usuario_articulo = %s",
          $this->GetSQLValueString($x->getUsuarioIdusuarioVota(), "int"),
          $this->GetSQLValueString($x->getUsuarioIdusuarioVotado(), "int"),
          $this->GetSQLValueString($x->getArticuloIdarticulo(), "int"),
          $this->GetSQLValueString($x->getIdusuarioLikeUsuarioArticulo(), "int"));
          $Result1=$this->_cnn->query($query);
          if(!$Result1) {
                  return false;
            }else{
                  return $x->getIdusuarioLikeUsuarioArticulo();
          }
    }

    public function delete(UsuarioLikeUsuarioArticulo $x){
        $query=sprintf("DELETE FROM ".$this->tableName." WHERE idusuario_like_usuario_articulo=%s",
        $this->GetSQLValueString($x->getIdusuario(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function getByUsuarioIdVotado(UsuarioLikeUsuarioArticulo $x){
        $query=sprintf("SELECT count(ul.articulo_idarticulo) as count_articulo, ul.articulo_idarticulo, a.nombre FROM ".$this->tableName." as ul INNER JOIN articulo as a ON a.idarticulo = ul.articulo_idarticulo WHERE ul.usuario_idusuario_votado=%s GROUP BY ul.articulo_idarticulo ORDER BY count_articulo DESC LIMIT 1",
        $this->GetSQLValueString($x->getUsuarioIdusuarioVotado(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
                return false;
        }else{
            return $this->advancedQuery($query);
        }
    }

    public function advancedQueryByObjetc($query){
        $resp=array();
        $consulta=$this->_cnn->query($query);
        if(!$consulta){
            throw new Exception("Error al consultar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
            $row_consulta= $consulta->fetch_assoc();
            $totalRows_consulta= $consulta->num_rows;
                    if($totalRows_consulta>0){
                           do{
                              array_push($resp, $this->createObject($row_consulta));
                       }while($row_consulta= $consulta->fetch_assoc());  
                    }
        }
        return $resp;
    }

    public function getByUsers(UsuarioLikeUsuarioArticulo $x){
        $query=sprintf("SELECT * FROM ".$this->tableName." WHERE usuario_idusuario_vota=%s AND usuario_idusuario_votado=%s",
        $this->GetSQLValueString($x->getUsuarioIdusuarioVota(), "int"),
        $this->GetSQLValueString($x->getUsuarioIdusuarioVotado(), "int"));

        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }

    public function deleteByUsers(UsuarioLikeUsuarioArticulo $x){
        $query=sprintf("DELETE FROM ".$this->tableName." WHERE usuario_idusuario_vota=%s AND usuario_idusuario_votado=%s",
        $this->GetSQLValueString($x->getUsuarioIdusuarioVota(), "int"),
        $this->GetSQLValueString($x->getUsuarioIdusuarioVotado(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function deleteByIdUsuario(UsuarioLikeUsuarioArticulo $x){
        $query=sprintf("DELETE FROM ".$this->tableName." WHERE usuario_idusuario_vota=%s OR usuario_idusuario_votado=%s",
        $this->GetSQLValueString($x->getUsuarioIdusuarioVota(), "int"),
        $this->GetSQLValueString($x->getUsuarioIdusuarioVotado(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function getById($Id){
        $query="SELECT * FROM ".$this->tableName." WHERE idusuario_like_usuario_articulo= ".$Id;
            $Result1=$this->_cnn->query($query);
            if(!$Result1){
                throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                return $this->createObject($Result1->fetch_assoc());
            }
    }

    public function createObject($row){
        $x = new UsuarioLikeUsuarioArticulo();
        $x->setIdusuarioLikeUsuarioArticulo($row['idusuario_like_usuario_articulo']);
        $x->setUsuarioIdusuarioVota($row['usuario_idusuario_vota']);
        $x->setUsuarioIdusuarioVotado($row['usuario_idusuario_votado']);
        $x->setArticuloIdarticulo($row['articulo_idarticulo']);
        return $x;
    }

}
