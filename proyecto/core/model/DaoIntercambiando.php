<?php
require_once 'DTO/Base.php';
require_once 'DTO/Intercambiando.php';

class DaoIntercambiando extends base{

    public $tableName="intercambiando";

    public function add(Intercambiando $x){
          $query=sprintf("INSERT INTO ".$this->tableName." (articulo_idarticulo, idusuario_has_equipo_da, idusuario_has_equipo_recibe) VALUES (%s, %s, %s)",
          $this->GetSQLValueString($x->getArticuloIdarticulo(), "int"),
          $this->GetSQLValueString($x->getIdusuarioHasEquipoDa(), "int"),
          $this->GetSQLValueString($x->getIdusuarioHasEquipoRecibe(), "int"));
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

    public function update(Intercambiando $x){
          $query=sprintf("UPDATE ".$this->tableName." SET articulo_idarticulo=%s, idusuario_has_equipo_da=%s, idusuario_has_equipo_recibe=%s WHERE idintercambiando = %s",
          $this->GetSQLValueString($x->getArticuloIdarticulo(), "int"),
          $this->GetSQLValueString($x->getIdusuarioHasEquipoDa(), "int"),
          $this->GetSQLValueString($x->getIdusuarioHasEquipoRecibe(), "int"),
          $this->GetSQLValueString($x->getIdintercambio(), "int"));
          $Result1=$this->_cnn->query($query);
          if(!$Result1) {
                  return false;
            }else{
                  return $x->getIdintercambio();
          }
    }

    public function delete(Intercambiando $x){
        $query=sprintf("DELETE FROM ".$this->tableName." WHERE idintercambiando=%s",
        $this->GetSQLValueString($x->getIdusuario(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function deleteByIdUsuario(Intercambiando $x){
        $query=sprintf("DELETE FROM ".$this->tableName." WHERE idusuario_has_equipo_da=%s OR idusuario_has_equipo_recibe=%s",
        $this->GetSQLValueString($x->getIdusuarioHasEquipoDa(), "int"),
        $this->GetSQLValueString($x->getIdusuarioHasEquipoRecibe(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function getById($Id){
        $query="SELECT * FROM ".$this->tableName." WHERE idintercambiando= ".$Id;
            $Result1=$this->_cnn->query($query);
            if(!$Result1){
                throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                return $this->createObject($Result1->fetch_assoc());
            }
    }

    public function getByIdusuarioHasEquipoRecibe($idusuario_has_equipo){
        $query="SELECT * FROM ".$this->tableName." WHERE idusuario_has_equipo_recibe = ".$idusuario_has_equipo;
        $Result1=$this->_cnn->query($query);
        if(!$Result1){
            throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
            $intercambiando = $this->createObject($Result1->fetch_assoc());
            if($intercambiando->idintercambiando){
                return true;
            } else {
                return false;
            }
        }
    }

    public function getByIdusuarioHasEquipoDa($idusuario_has_equipo){
        $query="SELECT * FROM ".$this->tableName." WHERE idusuario_has_equipo_da = ".$idusuario_has_equipo;
        $Result1=$this->_cnn->query($query);
        if(!$Result1){
            throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
            $intercambiando = $this->createObject($Result1->fetch_assoc());
            if($intercambiando->idintercambiando){
                return true;
            } else {
                return false;
            }
        }
    }

    public function createObject($row){
        $x = new Intercambiando();
        $x->setIdintercambio($row['idintercambiando']);
        $x->setArticuloIdarticulo($row['articulo_idarticulo']);
        $x->setIdusuarioHasEquipoDa($row['idusuario_has_equipo_da']);
        $x->setIdusuarioHasEquipoRecibe($row['idusuario_has_equipo_recibe']);
        return $x;
    }

}
