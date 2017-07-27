<?php


session_start();
require_once('../../core/autoload.php');
require_once('../../core/model/DaoCategoria.php');


$DaoCategoria = new DaoCategoria();

$action = $_POST['method'];
$tablename = "categoria";


switch($action){

  case "all":
      echo json_encode( $DaoCategoria->getAll() );
  break;

  case "allForSelect":
      echo json_encode( $DaoCategoria->getAll() );
  break;

  case "delete":

  break;

  case "edit":
  break;

  case "save":

        $Categoria = new Categoria();
        $Categoria->setNombre($_POST["nombre"]);
        $Categoria->setIdcategoria($_POST["idcategoria"]);        

        $id = $DaoCategoria->add($Categoria);
        if($id>0){
            echo json_encode(array('status' => true, 'msg' => 'Se agrego correctamente tu registro', 'class'=>'success', 'data'=>$id));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'error',));
        }
  break;
}


