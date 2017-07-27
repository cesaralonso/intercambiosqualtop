<?php


session_start();
require_once('../../core/autoload.php');
require_once('../../core/model/DaoEquipo.php');
require_once('../../core/model/DaoIntercambio.php');


$DaoEquipo = new DaoEquipo();

$action = $_POST['method'];
$tablename = "equipo";


switch($action){

  case "all":
      echo json_encode( $DaoEquipo->getAll() );
  break;

  case "allForSelect":
      echo json_encode( $DaoEquipo->getAllByUserId($_SESSION["idusuario"]) );
  break;

  case "allMemberForMe":
      echo json_encode( $DaoEquipo->getAllMemberByUserId($_SESSION["idusuario"]) );
  break;

  case "allForMe":
      echo json_encode( $DaoEquipo->getAllByUserId($_SESSION["idusuario"]) );
  break;

  case "byId":
      $DaoIntercambio = new DaoIntercambio();
      $intercambios = $DaoIntercambio->getAllByUserId($_SESSION['idusuario']);
      $equipo = (array) $DaoEquipo->getById($_POST["idequipo"]);
      foreach ($intercambios as $key => $value) {
          if($intercambios[$key]['idintercambio'] === $equipo['intercambio_idintercambio']){
            $intercambios[$key]['selected'] = true;

          } else {
            $intercambios[$key]['selected'] = false;

          }
      }
      $equipo["intercambio"] = $intercambios;
      echo json_encode( array($equipo) );
  break;

  case "getDataById":
      $DaoIntercambio = new DaoIntercambio();
      $intercambios = $DaoIntercambio->getAllByUserId($_SESSION['idusuario']);
      $equipo = (array) $DaoEquipo->getById($_POST["idequipo"]);
      foreach ($intercambios as $key => $value) {
          if($intercambios[$key]['idintercambio'] === $equipo['intercambio_idintercambio']){
            $intercambios[$key]['selected'] = true;

          } else {
            $intercambios[$key]['selected'] = false;

          }
      }
      $equipo["intercambio"] = $intercambios;
      echo json_encode( $equipo );
  break;

  case "getByUserId":
      $Equipo = new Equipo();
      $Equipo->setIntercambioIdintercambio($_SESSION["idusuario"]);      
      echo json_encode( $DaoEquipo->getByUserId($Equipo) );
  break;

  case "delete":

  break;

  case "edit":
  break;

  case "update":

      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }

        $Equipo = new Equipo();
        $Equipo->setIdequipo($_POST["idequipo"]);        
        $Equipo->setNombre($_POST["nombre"]);        
        $Equipo->setPrecioMin($_POST['precio_min']);
        $Equipo->setPrecioMax($_POST['precio_max']);
        $Equipo->setCode($_POST['code']);
        $Equipo->setIntercambioIdintercambio($_POST['intercambio_idintercambio']);      
        $Equipo->setArticulosMax($_POST['articulos_max']); 

        $id = $DaoEquipo->update($Equipo);
        if(is_numeric($id)){
            echo json_encode(array('status' => true, 'msg' => 'Se actualizo correctamente tu registro', 'class'=>'success', 'data'=>$id));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'error',));
        }
  break;

  case "save":

      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }

        $Equipo = new Equipo();
        $Equipo->setNombre($_POST["nombre"]);        
        $Equipo->setPrecioMin($_POST['precio_min']);
        $Equipo->setPrecioMax($_POST['precio_max']);
        $Equipo->setIntercambioIdintercambio($_POST['intercambio_idintercambio']); 
        $Equipo->setArticulosMax($_POST['articulos_max']); 
        $Equipo->setCode(($_POST['code']==="") ? Core::llave().$_POST['intercambio_idintercambio'].Core::llave() : $_POST['code']);
        $id = $DaoEquipo->add($Equipo);

        if(is_numeric($id)){
            echo json_encode(array('status' => true, 'msg' => 'Se agrego correctamente tu registro', 'class'=>'success', 'data'=>$id));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'error',));
        }
  break;


}


