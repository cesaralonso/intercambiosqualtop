
<?php
require_once 'DTO/Base.php';
require_once 'DTO/UsuarioHasEquipo.php';

class DaoUsuarioHasEquipo extends base{

    public $tableName="usuario_has_equipo";

    public function add(UsuarioHasEquipo $x){
          $query=sprintf("INSERT INTO ".$this->tableName." (usuario_idusuario, equipo_idequipo, estatus_encuesta) VALUES (%s ,%s, %s)",
          $this->GetSQLValueString($x->getUsuarioIdusuario(), "int"),
          $this->GetSQLValueString($x->getEquipoIdequipo(), "int"),
          $this->GetSQLValueString($x->getEstatusEncuesta(), "text"));
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

    public function update(UsuarioHasEquipo $x){
          $query=sprintf("UPDATE ".$this->tableName." SET usuario_idusuario=%s, equipo_idequipo=%s, estatus_encuesta=%s WHERE idusuario_has_equipo = %s",
          $this->GetSQLValueString($x->getUsuarioIdusuario(), "int"),
          $this->GetSQLValueString($x->getEquipoIdequipo(), "int"),
          $this->GetSQLValueString($x->getEstatusEncuesta(), "text"),
          $this->GetSQLValueString($x->getIdsuarioHasEquipo(), "int"));
          $Result1=$this->_cnn->query($query);
          if(!$Result1) {
                  return false;
            }else{
                  return $x->getUsuarioIdusuario();
          }
    }


    public function delete(UsuarioHasEquipo $x){
        $query=sprintf("DELETE FROM ".$this->tableName." WHERE idusuario_has_equipo=%s",
        $this->GetSQLValueString($x->getIdusuario(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function deleteByUserIdAndEquipoId(UsuarioHasEquipo $x){
        $query=sprintf("DELETE FROM ".$this->tableName." WHERE usuario_idusuario=%s AND equipo_idequipo=%s",
        $this->GetSQLValueString($x->getUsuarioIdusuario(), "int"),
        $this->GetSQLValueString($x->getEquipoIdequipo(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function getById($Id){
        $query="SELECT * FROM ".$this->tableName." WHERE idusuario_has_equipo= ".$Id;
            $Result1=$this->_cnn->query($query);
            if(!$Result1){
                throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                return $this->createObject($Result1->fetch_assoc());
            }
    }

   public function getByObjIdusuarioIdequipo(UsuarioHasEquipo $x){
        $query=sprintf("SELECT * FROM ".$this->tableName." WHERE usuario_idusuario = %s AND equipo_idequipo = %s",
        $this->GetSQLValueString($x->getUsuarioIdusuario(), "int"),
        $this->GetSQLValueString($x->getEquipoIdequipo(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1){
            throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
            return $this->createObject($Result1->fetch_assoc());
        }
    }

    public function getByIdusuarioIdequipo($idusuario, $idequipo){
        $query=sprintf("SELECT * FROM ".$this->tableName." WHERE usuario_idusuario = %s AND equipo_idequipo = %s",
        $this->GetSQLValueString($idusuario, "int"),
        $this->GetSQLValueString($idequipo, "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1){
            throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
            return $this->createObject($Result1->fetch_assoc());
        }
    }

    public function createObject($row){
        $x = new UsuarioHasEquipo();
        $x->setIdusuarioHasEquipo($row['idusuario_has_equipo']);
        $x->setUsuarioIdusuario($row['usuario_idusuario']);
        $x->setEquipoIdequipo($row['equipo_idequipo']);
        $x->setEstatusEncuesta($row['estatus_encuesta']);
        return $x;
    }

}
