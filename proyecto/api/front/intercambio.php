<?php


session_start();
require_once('../../core/autoload.php');
require_once('../../core/model/DaoIntercambio.php');


$DaoIntercambio = new DaoIntercambio();

$action = $_POST['method'];
$tablename = "intercambio";


switch($action){

  case "all":
      echo json_encode( $DaoIntercambio->getAll() );
  break;

  case "allForSelect":
      echo json_encode( $DaoIntercambio->getAllByUserId($_SESSION["idusuario"]) );
  break;

  case "getByUserId":
      $Intercambio = new Intercambio();
      $Intercambio->setUsuarioIdusuario($_SESSION["idusuario"]);      
      echo json_encode( $DaoIntercambio->getByUserId($Intercambio) );
  break;

  case "delete":

  break;

  case "edit":
  break;

  case "save":

      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }

        $Intercambio = new Intercambio();
        $Intercambio->setNombre($_POST["nombre"]);        
        $Intercambio->setFechaIni($_POST['fecha_ini']);
        $Intercambio->setFechaFin($_POST['fecha_fin']);
        $Intercambio->setUsuarioIdusuario($_SESSION["idusuario"]);      
        $Intercambio->setEstatus("CREADO");      

        $id = $DaoIntercambio->add($Intercambio);
        if($id>0){
            echo json_encode(array('status' => true, 'msg' => 'Se agrego correctamente tu registro', 'class'=>'success', 'data'=>$id));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'error',));
        }
  break;
}


