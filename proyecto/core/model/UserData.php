<?php
/**
* @author cmagana
* @class UserData
* @brief Modelo de base de datos para la tabla de usuarios
**/

require_once 'DTO/Base.php';
require_once('DaoOrganizacion.php');
require_once('DaoExperto.php');
require_once('DaoOauth.php');
require_once('ProfileData.php');
require_once('DaoRoles.php');
require_once('DaoUbicaciones.php');


class UserData {
	public static $tablename = "user";

	public function UserData(){
		$this->id = "";
		$this->name = "";
		$this->rfc = "";
		$this->country = "1";
		$this->email = "";
		$this->code = "";
		$this->password = "";
		$this->created_at = "NOW()";
		$this->tipoRel = 0;
		$this->imagen = "";
        $this->is_active = "";
        $this->is_valid = "";
        $this->is_admin = "";
	}
        
	function getFullname(){ return $this->name; }

	public function add(){

		$sql = "insert into user (name,rfc,id_country,email,code,password,created_at,tipoRel) ";
		$sql .= "value (\"$this->name\",\"$this->rfc\",\"$this->country\",\"$this->email\",\"$this->code\",\"$this->password\",$this->created_at,$this->tipoRel)";
		$response = Executor::doit($sql);
		if( $response[0] ){
			$id = $response[1];
			/* 
			 *	INFO ORGANIZACION
			 *	================
			 */
			$org = new Organizacion();
			$org->setUsuarios_idUsuarios( $id );
			$org->setRoles_idRol(0);
			$org->setIdAlcanze(1);
			$org->setAvatar("assets/img/home/perfil.png");
			$org->setPortada("assets/img/home/PORTADA.jpg");

			$DaoOrganizacion = new DaoOrganizacion();
			$DaoOrganizacion->add($org);
			$orgId = $DaoOrganizacion->getByUserId( $id );
			/*
			 *	ADD OAUTH INFORMATION
			 *	=======================
			 */
			$oauth = new Oauth();
			$DaoOauth = new DaoOauth();
			$socialService = ['Facebook', 'Twitter'];
			$socialUrl = ['', ''];
			for ($i=0; $i < count($socialService); $i++) { 
				$oauth->setServicio( $socialService[$i] );
				$oauth->setUsuario_id( $orgId->id );
				$oauth->setUrlRed( $socialUrl[$i] );
				$DaoOauth->add( $oauth );
			}
		}
		return $response;
	}

	public function isRepeatedEmail($email){
		$sql = "select email from ".self::$tablename." where email='$email'";	
		$query = Executor::doit($sql);

		if($query[0]->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public static function delete($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set username=\"$this->username\",name=\"$this->name\",rfc=\"$this->rfc\",id_country=\"$this->country\",email=\"$this->email\",is_active=\"$this->is_active\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_email(){
		$sql = "update ".self::$tablename." set email=\"$this->email\" where id=$this->id";	
		return Executor::doit($sql);
	}

	public static function setCookie($numero_aleatorio, $id){
		$sql = "update ".self::$tablename." set session=\"$numero_aleatorio\" where id=$id";	
		return Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";	
		Executor::doit($sql);
	}

	public function activateId($id){
		$sql = "update ".self::$tablename." set is_active=1 where id=$id";	
		Executor::doit($sql);
	}

	public function activate(){
		$sql = "update ".self::$tablename." set is_active=1 where id=$this->id";	
		Executor::doit($sql);
	}

	public function validateId($id){
		$sql = "update ".self::$tablename." set is_valid=1 where id=$id";	
		return Executor::doit($sql);
	}

	public static function getAdmin(){
		$sql = "select * from user where is_admin=1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getById($id){
		$sql = "select * from user where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getByOrgId($id){
		$sql = "select u.* from user as u INNER JOIN organizacion as o ON o.Usuarios_idUsuarios = u.id  WHERE o.id = $id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getOnlyUsersById($id){
		$sql = "select * from user where id=$id AND is_admin = 0 AND tipoRel = 1 AND is_valid=1 AND is_active=1 AND activo=1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getByEmail($email){
		$sql = "select * from ".self::$tablename." where email=\"$email\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getByEmailSha($email){
		$sql = "select * from ".self::$tablename." where sha1(md5(email))=\"$email\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getLogin($email,$password){
		$sql = "select * from ".self::$tablename." where  activo = 1 and is_active = 1 and is_valid = 1 and email=\"$email\" and password=\"$password\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}


	public static function getAllActiveActorsExceptMe($id){
		$sql = "select * from ".self::$tablename." where activo = 1 and is_active = 1 and is_valid = 1 and id != $id and tipoRel = 1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename."";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());

	}

	public static function getInactives(){
		$sql = "select * from ".self::$tablename." where is_active=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getActives(){
		$sql = "select * from ".self::$tablename." where is_active=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
	
	public static function getLike($q,$user_id){
		//$sql = "select * from ".self::$tablename." inner join organizacion as o on (o.Usuarios_idUsuarios = user.id) inner join profile on (user.id=profile.user_id) where user.is_active=1 and user.activo = 1 and name like '%$q%' or rfc = '%$q%' ";
		$sql = "select user.*,o.avatar,o.portada from ".self::$tablename." inner join organizacion as o on (o.Usuarios_idUsuarios = user.id) where user.tipoRel = 1 AND user.id != $user_id and user.is_valid = 1 and user.is_active=1 and user.activo = 1 and user.name like '%$q%' or user.rfc = '%$q%' ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function userInformation($id){
		$DaoOrganizacion = new DaoOrganizacion();
		$Organizacion = new Organizacion();
		$org = $DaoOrganizacion->getByUserId( $id );
		$sql = "select u.id as _id, u.name as _name, u.rfc as _rfc, u.username as _username, u.email as _email, u.id_country as _country, u.is_active as _active, u.is_valid as _valid, u.is_admin as _admin, u.tipoRel as _tipoUsuario, o.mision as _mision, o.vision as _vision, o.quienSoy as _quiensoy, o.telefono as _telefono, o.urlWeb as _urlweb, o.ubicacion as _ubicacion, c.nombre as _country_name, r.nombre as _role, r.idRol as _idRol, oaFacebook as _Facebook, oaTwitter as _Twitter,
			o.lat as _lat, o.lng as _lng
			from user u
			inner join organizacion o on u.id = o.Usuarios_idUsuarios
			inner join roles r on r.idRol = o.Roles_idRol 
			inner join paises as c on c.id = u.id_country
			JOIN(SELECT urlRed as oaFacebook, user_id FROM oauth WHERE user_id = " .$org->id ." AND servicio ='Facebook') as oauthx ON o.id = oauthx.user_id
			JOIN(SELECT urlRed as oaTwitter, user_id FROM oauth WHERE user_id = " .$org->id ." AND servicio ='Twitter') as oauthy ON o.id = oauthy.user_id
			where u.id =" . $id;
		$query = Executor::doit($sql);
		return Model::one( $query[0], new UserData());
	}

	public static function getActores(){
		$sql = "select * from user u inner join organizacion o on u.id = o.Usuarios_idUsuarios inner join roles r on o.Roles_idRol = r.idRol where u.is_valid = 1 and u.activo = 1 and  u.tipoRel = 1";
		$query = Executor::doit($sql);
		return Model::many( $query[0], new UserData());
	}

	public static function getActoresByEstate($estado_id){
		$sql = "select u.* from user as u 
				inner join organizacion as o ON o.Usuarios_idUsuarios = u.id
				inner join ubicaciones as ub ON ub.idOrganizacion = o.id
				where ub.is_matriz = 1 and ub.idEstado = $estado_id and u.is_valid = 1 and u.activo = 1 and  u.tipoRel = 1";
		$query = Executor::doit($sql);
		return Model::many( $query[0], new UserData());
	}

	public static function getActoresByCountryExcept($userid_a_validar,$id_country,$array_noids){
		$noIds_ = " ";
		//Core::debug($array_noids);
		foreach ($array_noids as $noid) {
			
		//Core::debug($noid);
			$noIds_ = $noIds_ . " and u.id != $noid ";
		}

		// Sacar la ubicación matriz del actor a validar
		$DaoUbicaciones = new DaoUbicaciones();
		
		// Sacar su Id de Estado
		$estado_id = 1;
		$matriz = $DaoUbicaciones->getMatrizByUserId($userid_a_validar);

		if( is_object($matriz) ) { 
			$estado_id = $matriz[0]->idEstado;
	    }

        // Obtener roles
        $DaoRoles 			= new DaoRoles();
        $roles 				= $DaoRoles->getAll();
        $arr_actor_rol 		= array();
        $arr_actor_rol_mas 	= array();
        $arr_actores 		= array(); 

		$fila 	= 1;


		/******  Seleccionar un actor de cada rol   ******/


        foreach ($roles as $rol) {

			// Obtener fila aleatoria
			$query_filas = "SELECT count(*) as count 
							from user u 
							inner join organizacion o on u.id = o.Usuarios_idUsuarios
							inner join ubicaciones as ub ON ub.idOrganizacion = o.id
							inner join roles r on o.Roles_idRol = r.idRol  
							where u.is_valid = 1 
							and u.is_active = 1 
							and u.activo = 1 
						$noIds_ 
							and u.id != $userid_a_validar
							and u.tipoRel = 1 
							and u.id_country = $id_country
							and o.Roles_idRol = $rol->id
							and ub.is_matriz = 1
							and ub.idEstado = $estado_id";	
			$query = Executor::doit($query_filas);

		//Core::debug( $query_filas );
		//Core::debug( $query );

			if ( $query[0]->num_rows > 0 ){
				$array_fila = Model::one( $query[0], new UserData());
				$fila = $array_fila->count;
			}

			// Número aleatorio
			$aleatorio = rand(0, $fila-1);

            $sql = "SELECT u.*
					from user u 
					inner join organizacion o on u.id = o.Usuarios_idUsuarios
					inner join ubicaciones as ub ON ub.idOrganizacion = o.id
					inner join roles r on o.Roles_idRol = r.idRol  
					where u.is_valid = 1 
					and u.is_active = 1 
					and u.activo = 1 $noIds_ 
					and u.id != $userid_a_validar
					and u.tipoRel = 1 
					and u.id_country = $id_country
					and o.Roles_idRol = $rol->id
					and ub.is_matriz = 1
					and ub.idEstado = $estado_id
					LIMIT $aleatorio, 1";
            $query = Executor::doit($sql);

		//Core::debug( $sql );
		//Core::debug( $query );



            if ( $query[0]->num_rows === 1 ){
				$res = Model::one( $query[0], new UserData());
                $arr_actor_rol[] =  $res;
				$noIds_ = $noIds_ . " and  u.id != $res->id "; 
            }

			$fila = 1;
        }


		/******  Sin importar rol  ******/


        // Si no se acompletaron los 6 actores se acompleta con actores aleatorios
        $count_registros = count($arr_actor_rol);

        if ($count_registros<6){

			// Obtener fila aleatoria
			$query_filas = "select count(*) as count from user u 
								inner join organizacion o on u.id = o.Usuarios_idUsuarios 
								inner join ubicaciones as ub ON ub.idOrganizacion = o.id
								inner join roles r on o.Roles_idRol = r.idRol  
								where u.is_valid = 1 
								and u.is_active = 1 
								and u.activo = 1 $noIds_ 
								and u.id != $userid_a_validar 
								and u.tipoRel = 1 
								and u.id_country = $id_country
								and ub.is_matriz = 1
								and ub.idEstado = $estado_id";
			$query = Executor::doit($query_filas);


			if ( $query[0]->num_rows > 0 ){
				$array_fila = Model::one( $query[0], new UserData());
				$fila = $array_fila->count;
			}

            $faltan 	= 6 - $count_registros;
			$aleatorio 	= rand(0, $fila-1);

			if(($aleatorio + $faltan) > $count_registros){
				$aleatorio = $aleatorio - $faltan;
				if($aleatorio <= 0){
					$aleatorio = 0;
				}
			}

            $sql = "select u.* from user u 
						inner join organizacion o on u.id = o.Usuarios_idUsuarios 
						inner join ubicaciones as ub ON ub.idOrganizacion = o.id
						inner join roles r on o.Roles_idRol = r.idRol  
						where u.is_valid = 1 
						and u.is_active = 1 
						and u.activo = 1 $noIds_ 
						and u.id != $userid_a_validar 
						and u.tipoRel = 1 
						and u.id_country = $id_country
						and ub.is_matriz = 1
						and ub.idEstado = $estado_id
						LIMIT $aleatorio, $faltan";
            $query = Executor::doit($sql);

		//Core::debug( $sql );
		//Core::debug( $query );
            $arr_actor_rol_mas[] =  Model::many( $query[0], new UserData());
        }

        $arr_actores = array_merge($arr_actor_rol,$arr_actor_rol_mas[0]);


		/******* Ahora sin restricciones de estado ni rol   ******/


        // Si no se acompletaron los 6 actores se acompleta con actores aleatorios
        $count_registros = count($arr_actor_rol);

        if ($count_registros<6){

			// Obtener fila aleatoria
			$query_filas = "select count(*) as count from user u 
								inner join organizacion o on u.id = o.Usuarios_idUsuarios 
								inner join roles r on o.Roles_idRol = r.idRol  
								where u.is_valid = 1 
								and u.is_active = 1 
								and u.activo = 1 
								$noIds_ 
								and u.id != $userid_a_validar 
								and u.tipoRel = 1 
								and u.id_country = $id_country";
			$query = Executor::doit($query_filas);

			if ( $query[0]->num_rows > 0 ){
				$array_fila = Model::one( $query[0], new UserData());
				$fila = $array_fila->count;
			}

            $faltan 	= 6 - $count_registros;
			$aleatorio 	= rand(0, $fila-1);

			if(($aleatorio + $faltan) > $count_registros){
				$aleatorio = $aleatorio - $faltan;
				if($aleatorio <= 0){
					$aleatorio = 0;
				}
			}

            $sql = "select u.* from user u 
						inner join organizacion o on u.id = o.Usuarios_idUsuarios 
						inner join roles r on o.Roles_idRol = r.idRol  
						where u.is_valid = 1 
						and u.is_active = 1 
						and u.activo = 1 
						$noIds_ 
						and u.id != $userid_a_validar 
						and u.tipoRel = 1 
						and u.id_country = $id_country
						LIMIT $aleatorio, $faltan";
            $query = Executor::doit($sql);

		//Core::debug( $sql );
		//Core::debug( $query );
            $arr_actor_rol_mas2[] =  Model::many( $query[0], new UserData());
        }
        $arr_actores = array_merge($arr_actor_rol,$arr_actor_rol_mas2[0]);


		//Core::debug( $arr_actores );
        return $arr_actores;	
	}


	public static function getActoresByCountry($userid_a_validar,$id_country){

		// Sacar la ubicación matriz del actor a validar
		$DaoUbicaciones = new DaoUbicaciones();
		$matriz = $DaoUbicaciones->getMatrizByUserId($userid_a_validar);

		// Sacar su Id de Estado
		$estado_id = $matriz[0]->idEstado;

        // Obtener roles
        $DaoRoles 			= new DaoRoles();
        $roles 				= $DaoRoles->getAll();
        $arr_actor_rol 		= array();
        $arr_actor_rol_mas 	= array();
        $arr_actores 		= array(); 

		$fila 	= 1;
		$noIds_ = ""; 


		/******  Seleccionar un actor de cada rol   ******/


        foreach ($roles as $rol) {

			// Obtener fila aleatoria
			$query_filas = "SELECT count(*) as count 
							from user u 
							inner join organizacion o on u.id = o.Usuarios_idUsuarios
							inner join ubicaciones as ub ON ub.idOrganizacion = o.id
							inner join roles r on o.Roles_idRol = r.idRol  
							where u.is_valid = 1 
							and u.is_active = 1 
							and u.activo = 1 $noIds_ 
							and u.id != $userid_a_validar
							and u.tipoRel = 1 
							and u.id_country = $id_country
							and o.Roles_idRol = $rol->id
							and ub.is_matriz = 1
							and ub.idEstado = $estado_id";	
			$query = Executor::doit($query_filas);

			if ( $query[0]->num_rows > 0 ){
				$array_fila = Model::one( $query[0], new UserData());
				$fila = $array_fila->count;
			}

			// Número aleatorio
			$aleatorio = rand(0, $fila-1);

            $sql = "SELECT u.*
					from user u 
					inner join organizacion o on u.id = o.Usuarios_idUsuarios
					inner join ubicaciones as ub ON ub.idOrganizacion = o.id
					inner join roles r on o.Roles_idRol = r.idRol  
					where u.is_valid = 1 
					and u.is_active = 1 
					and u.activo = 1 $noIds_ 
					and u.id != $userid_a_validar
					and u.tipoRel = 1 
					and u.id_country = $id_country
					and o.Roles_idRol = $rol->id
					and ub.is_matriz = 1
					and ub.idEstado = $estado_id
					LIMIT $aleatorio, 1";
            $query = Executor::doit($sql);

            if ( $query[0]->num_rows === 1 ){
				$res = Model::one( $query[0], new UserData());
                $arr_actor_rol[] =  $res;
				$noIds_ = $noIds_ . " and  u.id != $res->id "; 
            }

			$fila = 1;
        }


		/******  Sin importar rol  ******/


        // Si no se acompletaron los 6 actores se acompleta con actores aleatorios
        $count_registros = count($arr_actor_rol);

        if ($count_registros<6){

			// Obtener fila aleatoria
			$query_filas = "select count(*) as count from user u 
								inner join organizacion o on u.id = o.Usuarios_idUsuarios 
								inner join ubicaciones as ub ON ub.idOrganizacion = o.id
								inner join roles r on o.Roles_idRol = r.idRol  
								where u.is_valid = 1 
								and u.is_active = 1 
								and u.activo = 1 $noIds_ 
								and u.id != $userid_a_validar 
								and u.tipoRel = 1 
								and u.id_country = $id_country
								and ub.is_matriz = 1
								and ub.idEstado = $estado_id";
			$query = Executor::doit($query_filas);

			if ( $query[0]->num_rows > 0 ){
				$array_fila = Model::one( $query[0], new UserData());
				$fila = $array_fila->count;
			}

            $faltan 	= 6 - $count_registros;
			$aleatorio 	= rand(0, $fila-1);

			if(($aleatorio + $faltan) > $count_registros){
				$aleatorio = $aleatorio - $faltan;
				if($aleatorio <= 0){
					$aleatorio = 0;
				}
			}

            $sql = "select u.* from user u 
						inner join organizacion o on u.id = o.Usuarios_idUsuarios 
						inner join ubicaciones as ub ON ub.idOrganizacion = o.id
						inner join roles r on o.Roles_idRol = r.idRol  
						where u.is_valid = 1 
						and u.is_active = 1 
						and u.activo = 1 $noIds_ 
						and u.id != $userid_a_validar 
						and u.tipoRel = 1 
						and u.id_country = $id_country
						and ub.is_matriz = 1
						and ub.idEstado = $estado_id
						LIMIT $aleatorio, $faltan";
            $query = Executor::doit($sql);

            $arr_actor_rol_mas[] =  Model::many( $query[0], new UserData());
        }

        $arr_actores = array_merge($arr_actor_rol,$arr_actor_rol_mas[0]);


		/******* Ahora sin restricciones de estado ni rol   ******/


        // Si no se acompletaron los 6 actores se acompleta con actores aleatorios
        $count_registros = count($arr_actor_rol);

        if ($count_registros<6){

			// Obtener fila aleatoria
			$query_filas = "select count(*) as count from user u 
								inner join organizacion o on u.id = o.Usuarios_idUsuarios 
								inner join roles r on o.Roles_idRol = r.idRol  
								where u.is_valid = 1 
								and u.is_active = 1 
								and u.activo = 1 
								$noIds_ 
								and u.id != $userid_a_validar 
								and u.tipoRel = 1 
								and u.id_country = $id_country";
			$query = Executor::doit($query_filas);

			if ( $query[0]->num_rows > 0 ){
				$array_fila = Model::one( $query[0], new UserData());
				$fila = $array_fila->count;
			}

            $faltan 	= 6 - $count_registros;
			$aleatorio 	= rand(0, $fila-1);

			if(($aleatorio + $faltan) > $count_registros){
				$aleatorio = $aleatorio - $faltan;
				if($aleatorio <= 0){
					$aleatorio = 0;
				}
			}

            $sql = "select u.* from user u 
						inner join organizacion o on u.id = o.Usuarios_idUsuarios 
						inner join roles r on o.Roles_idRol = r.idRol  
						where u.is_valid = 1 
						and u.is_active = 1 
						and u.activo = 1 
						$noIds_ 
						and u.id != $userid_a_validar 
						and u.tipoRel = 1 
						and u.id_country = $id_country
						LIMIT $aleatorio, $faltan";
            $query = Executor::doit($sql);

            $arr_actor_rol_mas2[] =  Model::many( $query[0], new UserData());
        }
        $arr_actores = array_merge($arr_actor_rol,$arr_actor_rol_mas2[0]);

        return $arr_actores;	
	}

	public static function getExpertosByCountry($userid_a_validar,$id_country){
		$sql = "select u.id from user u inner join experto as e on u.id = e.Usuarios_idUsuarios where u.is_valid = 1 and u.is_active = 1 and u.activo = 1 and u.id != ".$userid_a_validar." and u.tipoRel = 2  and u.id_country = ".$id_country;
		$query = Executor::doit($sql);
		return Model::many( $query[0], new UserData());
	}

	public static function getMyFriends( $id_user ){
		$sql = "select u.id as _id, u.name as _name from user u where id in (
				select  f.receptor_id as _receptor
				from user u
				inner join friend as f on u.id = f.sender_id
				where u.is_valid = 1 and u.activo = 1 and u.is_active = 1 and f.is_accepted = 1 and f.sender_id =". $id_user. ");";
		$query = Executor::doit($sql);
		return Model::many( $query[0], new UserData());
	}

    public function disable($id){
		$sql = "update ".self::$tablename." set activo=0, is_active=0 where id=$id";	
		Executor::doit($sql);
	}

    public function addUser(){
		$sql = "insert into user (name,rfc,id_country,email,code,password,created_at,tipoRel,is_valid) ";
		$sql .= "value (\"$this->name\",\"$this->rfc\",\"$this->country\",\"$this->email\",\"$this->code\",\"$this->password\",$this->created_at,$this->tipoRel,$this->is_valid)";
		$response = Executor::doit($sql);

		if( $response[0] ){
			$id = $response[1];
			/* 
			 *	INFO ORGANIZACION
			 *	================
			 */
			$org = new Organizacion();
			$org->setUsuarios_idUsuarios( $id );
			$org->setRoles_idRol(0);
			$org->setIdAlcanze(1);
			$DaoOrganizacion = new DaoOrganizacion();
			$DaoOrganizacion->add($org);
			$orgId = $DaoOrganizacion->getByUserId( $id );
			/*
			 *	ADD OAUTH INFORMATION
			 *	=======================
			 */
			$oauth = new Oauth();
			$DaoOauth = new DaoOauth();
			$socialService = ['Facebook', 'Twitter'];
			$socialUrl = ['', ''];
			for ($i=0; $i < count($socialService); $i++) { 
				$oauth->setServicio( $socialService[$i] );
				$oauth->setUsuario_id( $orgId->id );
				$oauth->setUrlRed( $socialUrl[$i] );
				$DaoOauth->add( $oauth );
			}
		}
		return $response;
	}
        
    public function updateUser(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",email=\"$this->email\",is_active=$this->is_active where id=$this->id";
		Executor::doit($sql);
	}
        
    public function updateImagenUser(){
		$sql = "update ".self::$tablename." set imagen=\"$this->imagen\" where id=$this->id";
		Executor::doit($sql);
	}
        
}

?>