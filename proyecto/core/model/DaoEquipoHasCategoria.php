<?php
require_once 'DTO/Base.php';
require_once 'DTO/Equipo.php';

class DaoEquipo extends base{

    public $tableName="equipo";

    public function add(Usuarios $x){
          $query=sprintf("INSERT INTO ".$this->tableName." (nombre, precio_min, precio_max, fecha_ini, fecha_fin) VALUES (%s ,%s, %s, %s, %s)",
          $this->GetSQLValueString($x->getNombre(), "text"),
          $this->GetSQLValueString($x->getPrecioMin(), "int"),
          $this->GetSQLValueString($x->getPrecioMax(), "int"),
          $this->GetSQLValueString($x->getFechaIni(), "date"),
          $this->GetSQLValueString($x->getFechaFin(), "date"));
          $Result1=$this->_cnn->query($query);
            if(!$Result1) {
                    throw new Exception("Error al insertar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
               return $this->_cnn->insert_id;
          }
    }

    public function getAll(){
        $query = "SELECT * FROM ".$this->tableName." ORDER BY nombre";
        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }

    public function update(Usuarios $x){
          $query=sprintf("UPDATE ".$this->tableName." SET nombre=%s, precio_min=%s, precio_max=%s, fecha_ini=%s, fecha_fin=%s  WHERE idequipo = %s",
          $this->GetSQLValueString($x->getNombre(), "text"),
          $this->GetSQLValueString($x->getPrecioMin(), "int"),
          $this->GetSQLValueString($x->getPrecioMax(), "int"),
          $this->GetSQLValueString($x->getFechaIni(), "date"),
          $this->GetSQLValueString($x->getFechaFin(), "date"),
          $this->GetSQLValueString($x->getIdequipo(), "int"));
          $Result1=$this->_cnn->query($query);
          if(!$Result1) {
                    throw new Exception("Error al actualizar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                  return $x->getId();
          }
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
        $x->setNombre($row['nombre']);
        $x->setPrecioMin($row['precio_min']);
        $x->setPrecioMax($row['precio_max']);
        $x->setFechaIni($row['fecha_ini']);
        $x->setFechaFin($row['fecha_fin']);
        return $x;
    }

}
