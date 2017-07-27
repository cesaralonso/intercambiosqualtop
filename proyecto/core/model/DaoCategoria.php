<?php
require_once 'DTO/Base.php';
require_once 'DTO/Categoria.php';

class DaoCategoria extends base{

    public $tableName="categoria";

    public function add(Categoria $x){
          $query=sprintf("INSERT INTO ".$this->tableName." (idcategoria, nombre) VALUES (%s ,%s)",
          $this->GetSQLValueString($x->getIdcategoria(), "text"),
          $this->GetSQLValueString($x->getNombre(), "text"));
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

    public function delete($idcategoria){
        $query = sprintf("DELETE FROM ".$this->tableName." WHERE idcategoria=$idcategoria");
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
          throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
          return true;
        }
    }

    public function getById($idcategoria){
        $query="SELECT * FROM ".$this->tableName." WHERE idcategoria=$idcategoria";
            $Result1=$this->_cnn->query($query);
            if(!$Result1){
                throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                return $this->createObject($Result1->fetch_assoc());
            }
    }

    public function createObject($row){
        $x = new Categoria();
        $x->setIdcategoria($row['idcategoria']);
        $x->setNombre($row['nombre']);
        return $x;
    }

}
