<?php
require_once 'DTO/Base.php';
require_once 'DTO/Intercambio.php';

class DaoIntercambio extends base{

    public $tableName="intercambio";

    public function add(Intercambio $x){
          $query=sprintf("INSERT INTO ".$this->tableName." (nombre, fecha_ini, fecha_fin, estatus, usuario_idusuario) VALUES (%s ,%s, %s, %s, %s)",
          $this->GetSQLValueString($x->getNombre(), "text"),
          $this->GetSQLValueString($x->getFechaIni(), "date"),
          $this->GetSQLValueString($x->getFechaFin(), "date"),
          $this->GetSQLValueString($x->getEstatus(), "text"),
          $this->GetSQLValueString($x->getUsuarioIdusuario(), "int"));
          $Result1=$this->_cnn->query($query);
            if(!$Result1) {
               return false;
            }else{
               return $this->_cnn->insert_id;
          }
    }

    public function getAll(){
        $query = "SELECT * FROM ".$this->tableName." ORDER BY nombre";
        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }
                      
    public function getAllByUserId($idusuario){
        $query = "SELECT idintercambio, nombre, fecha_ini, fecha_fin, estatus FROM ".$this->tableName." WHERE usuario_idusuario = $idusuario ORDER BY nombre";
        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }

    public function getByUserId(Intercambio $x){

        $query=sprintf("SELECT idintercambio FROM ".$this->tableName." WHERE usuario_idusuario = %s",
        $this->GetSQLValueString($x->getUsuarioIdusuario(), "int"));

        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }

    public function update(Intercambio $x){
          $query=sprintf("UPDATE ".$this->tableName." SET nombre=%s, fecha_ini=%s, fecha_fin=%s, usuario_idusuario=%s, estatus=%s  WHERE idintercambio = %s",
          $this->GetSQLValueString($x->getNombre(), "text"),
          $this->GetSQLValueString($x->getFechaIni(), "date"),
          $this->GetSQLValueString($x->getFechaFin(), "date"),
          $this->GetSQLValueString($x->getUsuarioIdusuario(), "int"),
          $this->GetSQLValueString($x->getEstatus(), "text"),
          $this->GetSQLValueString($x->getIdintercambio(), "int"));
          $Result1=$this->_cnn->query($query);
          if(!$Result1) {
                    throw new Exception("Error al actualizar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                  return $x->getId();
          }
    }

    public function delete($Id){
        $query = sprintf("DELETE FROM ".$this->tableName." WHERE idintercambio=".$Id);
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function getById($Id){
        $query="SELECT * FROM ".$this->tableName." WHERE idintercambio= ".$Id;
            $Result1=$this->_cnn->query($query);
            if(!$Result1){
                throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                return $this->createObject($Result1->fetch_assoc());
            }
    }

    public function createObject($row){
        $x = new Intercambio();
        $x->setIdintercambio($row['idintercambio']);
        $x->setNombre($row['nombre']);
        $x->setFechaIni($row['fecha_ini']);
        $x->setFechaFin($row['fecha_fin']);
        $x->setEstatus($row['estatus']);
        $x->setUsuarioIdusuario($row['usuario_idusuario']);
        return $x;
    }

}
