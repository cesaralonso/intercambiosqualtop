<?php
require_once 'DTO/Base.php';
require_once 'DTO/Articulo.php';

class DaoArticulo extends base{

    public $tableName="articulo";

    public function add(Articulo $x){
          $query=sprintf("INSERT INTO ".$this->tableName." (nombre, precio_min, precio_max) VALUES (%s, %s, %s)",
          $this->GetSQLValueString($x->getNombre(), "text"),
          $this->GetSQLValueString($x->getPrecioMin(), "int"),
          $this->GetSQLValueString($x->getPrecioMax(), "int"));
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

    public function update(Articulo $x){
          $query=sprintf("UPDATE ".$this->tableName." SET nombre=%s, precio_min=%s, precio_max=%s WHERE idarticulo = %s",
          $this->GetSQLValueString($x->getNombre(), "text"),
          $this->GetSQLValueString($x->getPrecioMin(), "int"),
          $this->GetSQLValueString($x->getPrecioMax(), "int"),
          $this->GetSQLValueString($x->getIdarticulo(), "int"));
          $Result1=$this->_cnn->query($query);
          if(!$Result1) {
                  return false;
            }else{
                  return $x->getIdarticulo();
          }
    }


    public function delete(Articulo $x){
        $query=sprintf("DELETE FROM ".$this->tableName." WHERE idarticulo=%s",
        $this->GetSQLValueString($x->getIdarticulo(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }


    public function getById($Id){
        $query="SELECT * FROM ".$this->tableName." WHERE idarticulo= ".$Id;
        $Result1=$this->_cnn->query($query);
        if(!$Result1){
            throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
            return $this->createObject($Result1->fetch_assoc());
        }
    }

    public function getAllByUserId($idusuario){
        $query="SELECT * FROM ".$this->tableName." as a INNER JOIN usuario_has_articulo as ua ON ua.articulo_idarticulo = a.idarticulo WHERE ua.usuario_idusuario = $idusuario";
        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }

    public function getRandomOneByUserId($idusuario){
        $query="SELECT * FROM ".$this->tableName." as a INNER JOIN usuario_has_articulo as ua ON ua.articulo_idarticulo = a.idarticulo WHERE ua.usuario_idusuario = $idusuario  ORDER BY rand() LIMIT 1";
        $Result1=$this->_cnn->query($query);
        if(!$Result1){
            throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
            return $this->createObject($Result1->fetch_assoc());
        }
    }

    public function getRandomOneByIdequipo($idequipo){
        $query="SELECT * FROM ".$this->tableName." as a  
        INNER JOIN usuario_has_articulo as ua ON ua.articulo_idarticulo = a.idarticulo 
        INNER JOIN usuario_has_equipo as ue ON ue.usuario_idusuario = ua.usuario_idusuario 
        WHERE ue.equipo_idequipo = $idequipo  ORDER BY rand() LIMIT 1";
        $Result1=$this->_cnn->query($query);
        if(!$Result1){
            throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
            return $this->createObject($Result1->fetch_assoc());
        }
    }

    

    public function getAllByPriceRange(Articulo $x){
        $query=sprintf("SELECT * FROM ".$this->tableName." WHERE precio_min>=%s AND precio_max<=%s",
        $this->GetSQLValueString($x->getPrecioMin(), "int"),
        $this->GetSQLValueString($x->getPrecioMax(), "int"));


        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return $this->advancedQueryByObjetc($query);
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
    


    public function createObject($row){
        $x = new Articulo();
        $x->setIdarticulo($row['idarticulo']);
        $x->setNombre($row['nombre']);
        $x->setPrecioMin($row['precio_min']);
        $x->setPrecioMax($row['precio_max']);
        return $x;
    }

}
