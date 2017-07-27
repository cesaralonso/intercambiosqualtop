<?php
require_once 'DTO/Base.php';
require_once 'DTO/Usuario.php';
require_once 'DaoUsuarioHasEquipo.php';
require_once 'DaoIntercambiando.php';
require_once 'DaoUsuarioLikeUsuarioArticulo.php';
require_once 'DaoArticulo.php';



class DaoUsuario extends base{

    public $tableName="usuario";


    public function add(Usuario $x){
          $query=sprintf("INSERT INTO ".$this->tableName." (email, password, nombres, avatar, rol_idrol, estatus) VALUES (%s ,%s, %s, %s, %s, %s)",
          $this->GetSQLValueString($x->getEmail(), "text"),
          $this->GetSQLValueString($x->getPassword(), "text"),
          $this->GetSQLValueString($x->getNombres(), "text"),
          $this->GetSQLValueString($x->getAvatar(), "text"),
          $this->GetSQLValueString($x->getRolIdrol(), "text"),
          $this->GetSQLValueString($x->getEstatus(), "text"));
          $Result1=$this->_cnn->query($query);

        if(!$Result1) {
                return false;
        }else{
               return $this->_cnn->insert_id;
        }
    }

    public function getAll(){
        $query = "SELECT u.idusuario, u.email, u.nombres, u.apellidos, u.avatar, u.rol_idrol, u.estatus, u.participa  FROM ".$this->tableName." as u ORDER BY nombres";
        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }

    public function getParticipandoByIdequipo($idequipo){
        $query = "SELECT * FROM ".$this->tableName." as u INNER JOIN usuario_has_equipo as ue ON ue.usuario_idusuario = u.idusuario  WHERE ue.equipo_idequipo = $idequipo AND u.participa = 0 ORDER BY u.nombres";
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
          return $this->advancedQueryByObjetc($query);
        }
    }

    public function getAllByIdequipo($idequipo){
        $query = "SELECT u.idusuario, u.email, u.nombres, u.apellidos, u.avatar, u.rol_idrol, u.estatus, u.participa FROM ".$this->tableName." as u INNER JOIN usuario_has_equipo as ue ON ue.usuario_idusuario = u.idusuario  WHERE ue.equipo_idequipo = $idequipo ORDER BY u.nombres";
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
          return $this->advancedQueryByObjetc($query);
        }
    }

    public function setIntercambioEquipo($idequipo){

        $query = "SELECT u.*, ue.* FROM ".$this->tableName." as u INNER JOIN usuario_has_equipo as ue ON ue.usuario_idusuario = u.idusuario
                  WHERE u.participa = 1 AND ue.equipo_idequipo = $idequipo ORDER BY u.nombres ASC";
        $Result1=$this->_cnn->query($query);
        $usuarios = $this->advancedQueryByObjetc($query);


        $organizados = array();

        function organizar_por_equipo($usuarios, $idequipo){

            $DaoArticulo = new DaoArticulo();
            $DaoUsuarioHasEquipo = new DaoUsuarioHasEquipo();
            $DaoIntercambiando = new DaoIntercambiando();
            $organizados = array();

            // Barro todos los usuarios del equipo
            foreach ($usuarios as $usuario_da) {
                

                $usuarios_reciben = $usuarios;
                shuffle($usuarios_reciben);


                // Obtener el usuario_has_equipo del usuario en curso en el equipo dado
                $UsuarioHasEquipo_da = $DaoUsuarioHasEquipo->getByIdusuarioIdequipo($usuario_da->idusuario, $idequipo);


                // Revisar si en intercambiando este idusuario_has_equipo ya está registrado para dar, si no lo está entonces cres un registro
                $usuarioYaIntercambiando = $DaoIntercambiando->getByIdusuarioHasEquipoDa($UsuarioHasEquipo_da->idusuario_has_equipo);


                if( !$usuarioYaIntercambiando ){

                    // Si no está intercambiando se busca a quien intercambiara $usuario->idusuario, a un usuario que no este registrado en Intercambiando como usuario que recibe
                    // Se barre de nuevo toda la lista de usuarios buscando usuario no recibiendo

                    
                    foreach ($usuarios_reciben as $usuario_recibe) {

                        // Obtener el usuario_has_equipo del usuario en curso en el equipo dado
                        $UsuarioHasEquipo_recibe = $DaoUsuarioHasEquipo->getByIdusuarioIdequipo($usuario_recibe->idusuario, $idequipo);
                        $usuarioYaRecibiendo = $DaoIntercambiando->getByIdusuarioHasEquipoRecibe($UsuarioHasEquipo_recibe->idusuario_has_equipo);

                        if( !$usuarioYaRecibiendo && $usuario_da->idusuario !== $usuario_recibe->idusuario){

                            // Obtiene para el usuario que recibe en curso el articulo que mas se ha repetido
                            $DaoUsuarioLikeUsuarioArticulo = new DaoUsuarioLikeUsuarioArticulo();
                            $UsuarioLikeUsuarioArticulo = new UsuarioLikeUsuarioArticulo();
                            $UsuarioLikeUsuarioArticulo->setUsuarioIdusuarioVotado($usuario_recibe->idusuario);
                            $articulo = $DaoUsuarioLikeUsuarioArticulo->getByUsuarioIdVotado($UsuarioLikeUsuarioArticulo);

                            // Si tiene una votación completa
                            if(count($articulo)>0){
                                $idarticulo = $articulo[0]['articulo_idarticulo'];
                                $articulo_nombre = $articulo[0]['nombre'];
                            } else {
                                
                                // Si no se busca aletoriamente un articulo del usuario
                                $Articulo_rand = $DaoArticulo->getRandomOneByUserId($usuario_recibe->idusuario);
                                $idarticulo = $Articulo_rand->idarticulo;
                                $articulo_nombre = $Articulo_rand->nombre;

                                if(!$idarticulo>0){

                                    // Si no se busca aletoriamente un articulo del equipo
                                    $Articulo_rand = $DaoArticulo->getRandomOneByIdequipo($idequipo);
                                    $idarticulo = $Articulo_rand->idarticulo;
                                    $articulo_nombre = $Articulo_rand->nombre;

                                }
                            }
                   
                            if(is_numeric($idarticulo)){
                                // Crea registro Intercambiando
                                $Intercambiando = new Intercambiando();
                                $Intercambiando->setArticuloIdarticulo($idarticulo);
                                $Intercambiando->setIdusuarioHasEquipoDa($UsuarioHasEquipo_da->idusuario_has_equipo);
                                $Intercambiando->setIdusuarioHasEquipoRecibe($UsuarioHasEquipo_recibe->idusuario_has_equipo);
                                $idintercambiando = $DaoIntercambiando->add($Intercambiando);
         
                                array_push($organizados, array( "articulo"=>$articulo_nombre,
                                                                "da_nombre"=>$usuario_da->nombres, 
                                                                "recibe_nombre"=>$usuario_recibe->nombres,
                                                                "da_email"=>$usuario_da->email, 
                                                                "recibe_email"=>$usuario_recibe->email,
                                                                "da_id"=>$usuario_da->idusuario,
                                                                "recibe_id"=>$usuario_recibe->idusuario) );
                            }

                            // Se sale del bucle
                            break;
                        }
                    }
                }
            }
            return $organizados;
        }


        $organizados = organizar_por_equipo($usuarios, $idequipo);


        if(!$Result1) {
              throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
            if( count($organizados)>0 ){
                return array("data"=>$organizados,"msg"=>"Se han organizado correctamente usuarios de este equipo");
            } else {
                return array("data"=>[],"msg"=>"¡Los usuarios ya estan organizados!");
            }
        }
    }

    public function getAllByIdequipoIdusuario($idequipo, $idusuario){
        $query = "SELECT u.idusuario, u.email, u.nombres, u.apellidos, u.avatar, u.rol_idrol, u.estatus, u.participa FROM ".$this->tableName." as u INNER JOIN usuario_has_equipo as ue ON ue.usuario_idusuario = u.idusuario  WHERE ue.equipo_idequipo = $idequipo AND  ue.usuario_idusuario = $idusuario ORDER BY u.apellidos";
        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }
 
    public function getAccess(Usuario $x){

        $query=sprintf("SELECT COUNT(*) as count, idusuario, rol_idrol as idrol FROM ".$this->tableName." WHERE email = %s AND password = %s",
        $this->GetSQLValueString($x->getEmail(), "text"),
        $this->GetSQLValueString($x->getPassword(), "text"));

        $resultSet = $this->advancedQuery($query);
        return $resultSet;
    }

    public function setParticipacion(Usuario $x){

        $query=sprintf("UPDATE ".$this->tableName." SET participa=1 WHERE email = %s AND password = %s",
        $this->GetSQLValueString($x->getEmail(), "text"),
        $this->GetSQLValueString($x->getPassword(), "text"));

        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
                return false;
        }else{
                return $x->getIdusuario();
        }
    }

    public function setParticipacionByIdusuario(Usuario $x){

        $query=sprintf("UPDATE ".$this->tableName." SET participa=%s WHERE idusuario = %s",
        $this->GetSQLValueString($x->getParticipa(), "int"),
        $this->GetSQLValueString($x->getIdusuario(), "int"));

        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
                return false;
        }else{
                return $x->getIdusuario();
        }
    }

    public function update(Usuario $x){
          $query=sprintf("UPDATE ".$this->tableName." SET email=%s, nombres=%s, avatar=%s, rol_idrol=%s, estatus=%s  WHERE idusuario = %s",
          $this->GetSQLValueString($x->getEmail(), "text"),
          $this->GetSQLValueString($x->getNombres(), "text"),
          $this->GetSQLValueString($x->getAvatar(), "text"),
          $this->GetSQLValueString($x->getRolIdrol(), "text"),
          $this->GetSQLValueString($x->getEstatus(), "text"),
          $this->GetSQLValueString($x->getIdusuario(), "int"));
          $Result1=$this->_cnn->query($query);
          if(!$Result1) {
                   return false;
            }else{
                  return $x->getIdusuario();
          }
    }

    public function delete(Usuario $x){
        $query=sprintf("DELETE FROM ".$this->tableName." WHERE idusuario=%s",
        $this->GetSQLValueString($x->getIdusuario(), "int"));
        $Result1=$this->_cnn->query($query);
        if(!$Result1) {
              throw new Exception("Error al eliminar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             return true;
        }
    }

    public function getById($Id){
        $query="SELECT  u.idusuario, u.email, u.nombres, u.apellidos, u.avatar, u.rol_idrol, u.estatus, u.participa FROM ".$this->tableName." as u WHERE idusuario= ".$Id;
            $Result1=$this->_cnn->query($query);
            if(!$Result1){
                throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                return $this->createObject($Result1->fetch_assoc());
            }
    }


    public function getDataById($Id){
        $query="SELECT * FROM ".$this->tableName." as u WHERE idusuario= ".$Id;
            $Result1=$this->_cnn->query($query);
            if(!$Result1){
                throw new Exception("Error al obtener: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                return $this->createObject($Result1->fetch_assoc());
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
        $x = new usuario();
        $x->setIdusuario($row['idusuario']);
        $x->setNombres($row['nombres']);
        $x->setEmail($row['email']);
        $x->setPassword((isset($row['password'])) ? $row['password'] : '');
        $x->setAvatar($row['avatar']);
        $x->setRolIdrol($row['rol_idrol']);
        $x->setEstatus($row['estatus']);
        $x->setParticipa($row['participa']);
        return $x;
    }

}
