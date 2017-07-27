<?php
session_start();
require_once('../../core/autoload.php');
require_once('../../core/model/DaoUsuario.php');
require_once('../../core/model/DaoUsuarioHasEquipo.php');
require_once('../../core/model/DaoArticulo.php');
require_once('../../core/model/DaoUsuarioHasArticulo.php');
require_once('../../core/model/DaoUsuarioLikeUsuarioArticulo.php');
require_once('../../core/model/DaoEquipo.php');
require_once('../../core/model/DaoIntercambiando.php');

$DaoUsuario = new DaoUsuario();

$action = $_POST['method'];
$tablename = "equipo";


switch($action){

  case "all":
      echo json_encode( $DaoUsuario->getAll() );
  break;

  case "getAllByIdequipo":

      $usuarios = $DaoUsuario->getAllByIdequipo($_POST['idequipo']);
      foreach ($usuarios as $usuario) {
        if($usuario->participa == 1){
          $usuario->participa = true;
        } else {
          $usuario->participa = false;
        }
      }
     echo json_encode($usuarios);

  break;

  case "emailToAllByIdequipo":

      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }

      $usuarios = $DaoUsuario->getParticipandoByIdequipo($_POST['idequipo']);
      foreach ($usuarios as $usuario) {
        $mensaje = "<h2>Intercambios Qualtop</h2><p>Estimado compañero ".$usuario->nombres.", </p><p>Te invitamos a participar en la dinámica del intercambio desde una plataforma web diseñada especialmente para poder disfrutar de un intercambio mas sencillo, mejor organizado y divertido.</p><p>Accediendo a la siguiente dirección <a href='http://ec2-54-162-99-35.compute-1.amazonaws.com/proyectos/intercambiosqualtop/proyecto/acceso'>Intercambios Qualtop</a> estarás aceptando participar, por favor accesa con el usuario: <strong>".$usuario->email."</strong> y el password: <strong>".$usuario->password."</strong></p><p>¡Esperamos disfrutes la experiencia!.</p>";

          $estatus_envio = Core::mail($usuario->email, "Participa en un intercambio", $mensaje, $mensaje);
      }
      echo json_encode(array("status"=>true, "msg"=>"Invitaciones enviadas", "class"=>"success"));

  break;

  case "finishAndEmailToAllByIdequipo":

      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }

      $DaoArticulo = new DaoArticulo();

      $usuarios = $DaoUsuario->getAllByIdequipo($_POST['idequipo']);
      
      // Aleatoriamente selecccionar un usuario para que le intercambie a usuario en curso
      // Se traen los usuarios que no han dado, tabla Intercambiando
      $response = $DaoUsuario->setIntercambioEquipo($_POST['idequipo']);

      // Datos del equipo
      $DaoEquipo = new DaoEquipo();
      $equipo = $DaoEquipo->getById($_POST['idequipo']);
      $equipo_precio_min = number_format($equipo->precio_min);
      $equipo_precio_max = number_format($equipo->precio_max);

      //Barrer  $response['data']
      foreach ($response['data'] as $organizado) {

          $organizados_da_nombre = $organizado['da_nombre'];
          $organizados_recibe_nombre = $organizado['recibe_nombre'];
          $organizados_articulo = $organizado['articulo'];
          $organizados_da_email = $organizado['da_email'];
          
          $articulos = $DaoArticulo->getAllByUserId($organizado['recibe_id']);

          $mensaje = "<h2>Intercambios Qualtop</h2><p>Estimad@ compañer@ $organizados_da_nombre</p>
          <p>El tiempo del sorteo del intercambio ha finalizado y estos fueron los resultados: </p>";

          if(count($articulos)>0){
            $mensaje .= "<p>Esta es la lista de articulos que $organizados_recibe_nombre ha sugerido para recibir:</p><ul>";

            foreach($articulos as $articulo){
                $mensaje .= "<li>".$articulo['nombre']."</li>";
            }

            $mensaje .= "</ul>";
          }

          $mensaje .= "<p>Se te ha sugerido por votación que le regales a <strong> $organizados_recibe_nombre </strong> el siguiente articulo: <strong> $organizados_articulo </strong>.</p>
          <p>Recuerda, el intercambio debe ser de la cantidad mínima de: </strong>$$equipo_precio_min</strong> a </strong>$$equipo_precio_max</strong>.</p>
          <p>Siente plena libertad de regalarle lo que al final creas que el merece.</p>
          <p>¡Te deseamos felices fiestas!.</p>";

          $estatus_envio = Core::mail($organizados_da_email, "Resultados de  intercambio", $mensaje, $mensaje);
      }
      echo json_encode(array("status"=>true, "msg"=>$response['msg'], "class"=>"success"));

  break;

  case "getAllByIdequipoWithArticulos":

      $DaoArticulo = new DaoArticulo();
      $usuarios = $DaoUsuario->getAllByIdequipo($_POST['idequipo']);

      // Usuario Has Equipo
      $DaoUsuarioLikeUsuarioArticulo = new DaoUsuarioLikeUsuarioArticulo();

      foreach ($usuarios as $usuario) {
        $articulos = $DaoArticulo->getAllByUserId($usuario->idusuario);

        // Se obtiene el articulo seleccionado por votante para votado
        $UsuarioLikeUsuarioArticulo = new UsuarioLikeUsuarioArticulo();
        $UsuarioLikeUsuarioArticulo->setUsuarioIdusuarioVota($_SESSION['idusuario']);
        $UsuarioLikeUsuarioArticulo->setUsuarioIdusuarioVotado($usuario->idusuario);
        $articulo = $DaoUsuarioLikeUsuarioArticulo->getByUsers($UsuarioLikeUsuarioArticulo);

        if(count($articulo)>0){
          foreach ($articulos as $key => $value) {
              if($articulos[$key]['articulo_idarticulo'] == $articulo[0]['articulo_idarticulo']){
                $articulos[$key]['selected_for_me'] = true;
              } else {
                $articulos[$key]['selected_for_me'] = false;
              }
          }
        }

        $usuario->articulos = ( is_array($articulos) ) ? $articulos : array($articulos);

        // Is mine 
        if($usuario->idusuario===$_SESSION['idusuario']) {
          $usuario->ismine = true;
        }
      
        // Datos del equipo
        $DaoEquipo = new DaoEquipo();
        $equipo = $DaoEquipo->getById($_POST['idequipo']);
        $equipo_precio_min = number_format($equipo->precio_min);
        $equipo_precio_max = number_format($equipo->precio_max);

        $usuario->equipo = array("precio_min"=>$equipo_precio_min,"precio_max"=>$equipo_precio_max, "precio_min_raw"=>$equipo->precio_min,"precio_max_raw"=>$equipo->precio_max);
      }
      echo json_encode( $usuarios );

  break;

  case "getAllByIdequipoIdusuario":
      echo json_encode( $DaoUsuario->getAllByIdequipoIdusuario($_POST['idequipo']),$_SESSION['idusuario']);
  break;

  case "getById":
      echo json_encode( $DaoUsuario->getById($_POST['idusuario']) );
  break;


  case "access":

      $Usuario = new Usuario();
      $Usuario->setEmail($_POST["email"]);
      $Usuario->setPassword($_POST["password"]);
      // Confirma participacion
      $access = $DaoUsuario->setParticipacion($Usuario);

      $access = $DaoUsuario->getAccess($Usuario);

      if($access[0]['count']){

        $_SESSION['idusuario'] = $access[0]['idusuario'];
        $_SESSION['idrol']     = $access[0]['idrol'];

        print_r ( json_encode(array('status' => true, 'msg' => 'Has ingresado correctamente', 'class'=>'success', 'idusuario'=> $_SESSION['idusuario'], 'idrol'=> $_SESSION['idrol'])) );
      } else {
        print_r ( json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'warning',)) );
      }

  break;

  case "enviarInvitacion":
      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }

      $usuario = $DaoUsuario->getDataById($_POST['idusuario']);

      $mensaje = "<h2>Intercambios Qualtop</h2><p>Estimado compañero ".$usuario->nombres.", </p><p>Te invitamos a participar en la dinámica del intercambio desde una plataforma web diseñada especialmente para poder disfrutar de un intercambio mas sencillo, mejor organizado y divertido.</p><p>Accediendo a la siguiente dirección <a href='http://ec2-54-162-99-35.compute-1.amazonaws.com/proyectos/intercambiosqualtop/proyecto/acceso'>Intercambios Qualtop</a> estarás aceptando participar, por favor accesa con el usuario: <strong>".$usuario->email."</strong> y el password: <strong>".$usuario->password."</strong></p><p>¡Esperamos disfrutes la experiencia!.</p>";

      $estatus_envio = Core::mail($usuario->email, "Participa en un intercambio", $mensaje, $mensaje);

      echo json_encode(array("status"=>true, "msg"=>"Invitacion enviada", "class"=>"success"));


  break;

  case "activarUsuario":
      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }

      $Usuario = new Usuario();
      $Usuario->setParticipa($_POST["participa"]);
      $Usuario->setIdusuario($_POST["idusuario"]);
      // Confirma participacion
      $status = $DaoUsuario->setParticipacionByIdusuario($Usuario);

      if($status){
        echo json_encode(array("status"=>true, "msg"=>"Usuario modificado", "class"=>"success"));
      }else{
        echo json_encode(array("status"=>false, "msg"=>"Ha ocurrido un error", "class"=>"error"));
      }

  break;

  case "delete":

      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }


      // Elimina usuario has articulo
      $DaoUsuarioHasArticulo = new DaoUsuarioHasArticulo();
      $UsuarioHasArticulo = new UsuarioHasArticulo();
      $UsuarioHasArticulo->setUsuarioIdusuario($_POST["idusuario"]);
      $eliminado = $DaoUsuarioHasArticulo->deleteByIdUsuario($UsuarioHasArticulo);

      // Elimina usuario like usuario
      $DaoUsuarioLikeUsuarioArticulo = new DaoUsuarioLikeUsuarioArticulo();
      $UsuarioLikeUsuarioArticulo = new UsuarioLikeUsuarioArticulo();
      $UsuarioLikeUsuarioArticulo->setUsuarioIdusuarioVota($_POST["idusuario"]);
      $UsuarioLikeUsuarioArticulo->setUsuarioIdusuarioVotado($_POST["idusuario"]);
      $eliminado = $DaoUsuarioLikeUsuarioArticulo->deleteByIdUsuario($UsuarioLikeUsuarioArticulo);

      // Elimina usuario has equipo
      $DaoUsuarioHasEquipo = new DaoUsuarioHasEquipo();
      $UsuarioHasEquipo = new UsuarioHasEquipo();
      $UsuarioHasEquipo->setUsuarioIdusuario($_POST["idusuario"]);
      $UsuarioHasEquipo->setEquipoIdequipo($_POST["idequipo"]);

      $usuarioequipo = $DaoUsuarioHasEquipo->getByObjIdusuarioIdequipo($UsuarioHasEquipo);

      // Elimina intercambiando
      $DaoIntercambiando = new DaoIntercambiando();
      $Intercambiando = new Intercambiando();
      $Intercambiando->setIdusuarioHasEquipoDa($usuarioequipo->idusuario_has_equipo );
      $Intercambiando->setIdusuarioHasEquipoRecibe($usuarioequipo->idusuario_has_equipo );
      $eliminado = $DaoIntercambiando->deleteByIdUsuario($Intercambiando);

      $eliminado = $DaoUsuarioHasEquipo->deleteByUserIdAndEquipoId($UsuarioHasEquipo);

      // Elimina el usuario
      $Usuario = new Usuario();
      $Usuario->setIdusuario($_POST["idusuario"]);      
      $eliminado = $DaoUsuario->delete($Usuario);

      if($eliminado){
        echo json_encode(array('status' => true, 'msg' => 'Se elimino correctamente tu registro', 'class'=>'success'));
      } else {
        echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'warning',));
      }
  break;

  case "edit":

  break;

  case "save":

      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }

      $fecha = new DateTime();
      
      $Usuario = new Usuario();
      $Usuario->setNombres($_POST["nombres"]);
      $Usuario->setEmail($_POST["email"]);
      $Usuario->setAvatar("");
      $Usuario->setPassword($_POST["password"]);
      $Usuario->setRolIdrol($_POST["rol_idrol"]);
      $Usuario->setEstatus("CREADO");
      $id = $DaoUsuario->add($Usuario);

      if($id>0){
        echo json_encode(array('status' => true, 'msg' => 'Se agrego correctamente tu registro', 'class'=>'success', 'data'=>$id));
      } else {
        echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'warning',));
      }

  break;

  case "saveLikeArticulo":

      if(!isset($_SESSION['idusuario'])){
        exit;
      }

      // Usuario Has Equipo
      $DaoUsuarioLikeUsuarioArticulo = new DaoUsuarioLikeUsuarioArticulo();
      $UsuarioLikeUsuarioArticulo = new UsuarioLikeUsuarioArticulo();
      $UsuarioLikeUsuarioArticulo->setUsuarioIdusuarioVota($_SESSION['idusuario']);
      $UsuarioLikeUsuarioArticulo->setUsuarioIdusuarioVotado($_POST['idusuario']);
      $UsuarioLikeUsuarioArticulo->setArticuloIdarticulo($_POST['idarticulo']);
      $deleted = $DaoUsuarioLikeUsuarioArticulo->deleteByUsers($UsuarioLikeUsuarioArticulo);

      if($deleted){
        $idUsuarioLikeUsuarioArticulo = $DaoUsuarioLikeUsuarioArticulo->add($UsuarioLikeUsuarioArticulo);
      }

      if(is_numeric($idUsuarioLikeUsuarioArticulo)){
        echo json_encode(array('status' => true, 'msg' => 'Se agrego correctamente tu registro', 'class'=>'success'));
      } else {
        echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'warning',));
      }

  break;

  case "saveIntegrante":

      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }

      $fecha = new DateTime();
      
      $Usuario = new Usuario();
      $Usuario->setNombres($_POST["nombres"]);
      $Usuario->setEmail($_POST["email"]);
      $Usuario->setAvatar("");
      $Usuario->setPassword(Core::llave().$_SESSION["idusuario"].Core::llave());
      $Usuario->setRolIdrol($_POST["rol_idrol"]);
      $Usuario->setParticipa(0);
      $Usuario->setEstatus("CREADO");
      $id = $DaoUsuario->add($Usuario);
      
      // Usuario Has Equipo
      $DaoUsuarioHasEquipo = new DaoUsuarioHasEquipo();
      $UsuarioHasEquipo = new UsuarioHasEquipo();
      $UsuarioHasEquipo->setUsuarioIdusuario($id);
      $UsuarioHasEquipo->setEquipoIdequipo($_POST["idequipo"]);
      $UsuarioHasEquipo->setEstatusEncuesta("CREADO");

      $idUsuarioHasEquipo = $DaoUsuarioHasEquipo->add($UsuarioHasEquipo);

      if(is_numeric($idUsuarioHasEquipo)){
        echo json_encode(array('status' => true, 'msg' => 'Se agrego correctamente tu registro', 'class'=>'success', 'data'=>$id));
      } else {
        echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'warning',));
      }

  break;

  case "updateIntegrante":

      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }

      $fecha = new DateTime();

      $Usuario = new Usuario();
      $Usuario = $DaoUsuario->getById($_POST["idusuario"]);
      
      $Usuario->setNombres($_POST["nombres"]);
      $Usuario->setEmail($_POST["email"]);
      $Usuario->setAvatar("");
      //$Usuario->setPassword($Usuario->getPassword());
      $Usuario->setRolIdrol($_POST["rol_idrol"]);
      $Usuario->setEstatus("MODIFICADO");
      $Usuario->setIdusuario($_POST["idusuario"]);
      $id = $DaoUsuario->update($Usuario);

      if(is_numeric($id)){
        echo json_encode(array('status' => true, 'msg' => 'Se modifico correctamente tu registro', 'class'=>'success', 'data'=>$id));
      } else {
        echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'warning',));
      }

  break;
}


