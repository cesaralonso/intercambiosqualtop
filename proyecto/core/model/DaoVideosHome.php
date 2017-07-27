<?php
require_once 'DTO/Base.php';
require_once 'DTO/VideosHome.php';

class DaoVideosHome extends base{
    
    public $tableName="videoshome"; 

    public function add(VideosHome $x){
          $query=sprintf("INSERT INTO ".$this->tableName." (ruta, nombre, descripcion, portada, thumbnail, seccion) VALUES (%s ,%s, %s, %s, %s, %s)",
          $this->GetSQLValueString($x->getRuta(), "text"),
          $this->GetSQLValueString($x->getNombre(), "text"),
          $this->GetSQLValueString($x->getDescripcion(), "text"),
          $this->GetSQLValueString($x->getPortada(), "int"),
          $this->GetSQLValueString($x->getThumbnail(), "int"),
          $this->GetSQLValueString($x->getSeccion(), "text"));
          $Result1=$this->_cnn->query($query);
            if(!$Result1) {
                    throw new Exception("Error al insertar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
               return $this->_cnn->insert_id; 
          }
    }

    public function update(VideosHome $x){
          $query=sprintf("UPDATE ".$this->tableName." SET ruta=%s, nombre=%s, descripcion=%s, portada=%s, thumbnail=%s, seccion=%s  WHERE idVideosHome = %s",
          $this->GetSQLValueString($x->getRuta(), "text"),
          $this->GetSQLValueString($x->getNombre(), "text"),
          $this->GetSQLValueString($x->getDescripcion(), "text"),
          $this->GetSQLValueString($x->getPortada(), "int"),
          $this->GetSQLValueString($x->getThumbnail(), "int"),
          $this->GetSQLValueString($x->getSeccion(), "text"),
          $this->GetSQLValueString($x->getId(), "int"));
          $Result1=$this->_cnn->query($query);
          if(!$Result1) {
                    throw new Exception("Error al actualizar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                  return $x->getId();  
          }
    }

    public function delete($Id){
        $query = sprintf("DELETE FROM ".$this->tableName." WHERE idVideosHome=".$Id); 
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function getById($Id){
        $query="SELECT * FROM ".$this->tableName." WHERE idVideosHome= ".$Id;
            $Result1=$this->_cnn->query($query);
            if(!$Result1){
                throw new Exception("Error al insertar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                return $this->createObject($Result1->fetch_assoc());
            }
    }

    public function createObject($row){
        $x = new VideosHome();
        $x->setId($row['idVideosHome']);
        $x->setRuta($row['ruta']);
        $x->setNombre($row['nombre']);
        $x->setDescripcion($row['descripcion']); 
        $x->setThumbnail($row['thumbnail']);
        $x->setPortada($row['portada']);
        $x->setSeccion($row['seccion']);
        return $x;
    }
          
    public function getAll($offset=null,$limit=null,$buscar=null){
        $query="";
        if($offset!=null && $limit!=null){
            $query=" LIMIT ".$limit." OFFSET ".$offset;
        }
        $queryBuscar="";
        if($buscar!=null){
           $queryBuscar=" WHERE (nombre LIKE '%".$buscar."%' OR descripcion LIKE '".$buscar."')";
        }
        $query="SELECT * FROM ".$this->tableName." ".$queryBuscar." ".$query;
         return $this->advancedQueryByObjetc($query);
    }

    public function getAllYoutube($offset=null,$limit=null,$buscar=null){
        $query="";
        if($offset!=null && $limit!=null){
            $query=" LIMIT ".$limit." OFFSET ".$offset;
        }
        $queryBuscar=" WHERE seccion = 'YOUTUBE' ";
        if($buscar!=null){
           $queryBuscar=" WHERE seccion = 'YOUTUBE' AND (nombre LIKE '%".$buscar."%' OR descripcion LIKE '".$buscar."')";
        }
        $query="SELECT * FROM ".$this->tableName." ".$queryBuscar." ".$query;
         return $this->advancedQueryByObjetc($query);
    }
    
    public function getAllCargados($offset=null,$limit=null,$buscar=null){
        $query="";
        if($offset!=null && $limit!=null){
            $query=" LIMIT ".$limit." OFFSET ".$offset;
        }
        $queryBuscar=" WHERE seccion = 'YOUTUBE' ";
        if($buscar!=null){
           $queryBuscar=" WHERE seccion = 'CARGADOS' AND (nombre LIKE '%".$buscar."%' OR descripcion LIKE '".$buscar."')";
        }
        $query="SELECT * FROM ".$this->tableName." ".$queryBuscar." ".$query;
         return $this->advancedQueryByObjetc($query);
    }
    
    public function getAllInPortada($offset=null,$limit=null,$buscar=null){
        $query="";
        if($offset!=null && $limit!=null){
            $query=" LIMIT ".$limit." OFFSET ".$offset;
        }
        $queryBuscar="";
        if($buscar!=null){
           $queryBuscar=" AND (nombre LIKE '%".$buscar."%' OR descripcion LIKE '".$buscar."')";
        }
        $query="SELECT * FROM ".$this->tableName." WHERE portada = 1 ".$queryBuscar." ".$query;
         return $this->advancedQueryByObjetc($query);
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
    
}
