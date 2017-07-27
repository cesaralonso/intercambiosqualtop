<?php
require_once 'DTO/Base.php';
require_once 'DTO/Equipo.php';

class DaoEquipo extends base{

    public $tableName="equipo";

    public function add(Equipo $x){
          $query=sprintf("INSERT INTO ".$this->tableName." (nombre, code, precio_min, precio_max, intercambio_idintercambio, articulos_max) VALUES (%s, %s, %s, %s, %s, %s)",
          $this->GetSQLValueString($x->getNombre(), "text"),
          $this->GetSQLValueString($x->getCode(), "text"),
          $this->GetSQLValueString($x->getPrecioMin(), "int"),
          $this->GetSQLValueString($x->getPrecioMax(), "int"),
          $this->GetSQLValueString($x->getIntercambioIdintercambio(), "int"),
          $this->GetSQLValueString($x->getArticulosMax(), "int"));
          $Result1=$this->_cnn->query($query);
            if(!$Result1) {
                return false;
            }else{
               return $this->_cnn->insert_id;
          }
    }

    public function update(Equipo $x){
          $query=sprintf("UPDATE ".$this->tableName." SET nombre=%s, code=%s, precio_min=%s, precio_max=%s, intercambio_idintercambio=%s, articulos_max=%s  WHERE idequipo = %s",
          $this->GetSQLValueString($x->getNombre(), "text"),
          $this->GetSQLValueString($x->getCode(), "text"),
          $this->GetSQLValueString($x->getPrecioMin(), "int"),
          $this->GetSQLValueString($x->getPrecioMax(), "int"),
          $this->GetSQLValueString($x->getIntercambioIdintercambio(), "int"),
          $this->GetSQLValueString($x->getArticulosMax(), "int"),
          $this->GetSQLValueString($x->getIdequipo(), "int"));
          $Result1=$this->_cnn->query($query);

          if(!$Result1) {
                  return false;
            }else{
                  return $x->getIdequipo();
          }
    }

    public function getAll(){
        $query = "SELECT * FROM ".$this->tableName." ORDER BY nombre";
        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }

    public function getAllByUserId($id){
        $query="SELECT idequipo, e.nombre, e.code FROM ".$this->tableName." as e INNER JOIN intercambio as i ON i.idintercambio = e.intercambio_idintercambio WHERE i.usuario_idusuario = $id";
        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }

    public function getAllMemberByUserId($id){
        $query="SELECT idequipo, e.nombre, e.code FROM ".$this->tableName." as e INNER JOIN usuario_has_equipo as ue ON ue.equipo_idequipo = e.idequipo WHERE ue.usuario_idusuario = $id";
        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }

    public function delete($Id){
        $query = sprintf("DELETE FROM ".$this->tableName." WHERE idequipo=".$Id);
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function getById($Id){
        $query="SELECT * FROM ".$this->tableName." WHERE idequipo= ".$Id;
            $Result1=$this->_cnn->query($query);
            if(!$Result1){
                throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                return $this->createObject($Result1->fetch_assoc());
            }
    }

    public function createObject($row){
        $x = new Equipo();
        $x->setIdequipo($row['idequipo']);
        $x->setCode($row['code']);
        $x->setNombre($row['nombre']);
        $x->setPrecioMin($row['precio_min']);
        $x->setPrecioMax($row['precio_max']);
        $x->setIntercambioIdintercambio($row['intercambio_idintercambio']);
        $x->setArticulosMax($row['articulos_max']);
        return $x;
    }

}
