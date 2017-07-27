<?php
session_start();
require_once('../../core/autoload.php');
require_once('../../core/model/DaoArticulo.php');
require_once('../../core/model/DaoUsuarioHasArticulo.php');
require_once('../../core/model/DaoEquipo.php');

$DaoArticulo = new DaoArticulo();

$action = $_POST['method'];
$tablename = "articulo";

switch($action){

  case "all":
      echo json_encode( $DaoArticulo->getAll() );
  break;

  case "saveUsuarioHasArticulo":

      if(!isset($_SESSION['idusuario'])){
        exit;
      }

      // Datos del equipo
      $DaoEquipo = new DaoEquipo();
      $equipo = $DaoEquipo->getById($_POST['idequipo']);
      $articulos_max = (!empty($equipo->articulos_max) && $equipo->articulos_max > 0) ? $equipo->articulos_max : 5;

      $DaoArticulo = new DaoArticulo();
      $idarticulo = null;

      // Si se envían datos de articulo o se obtiene de listado
      if(!empty($_POST['nombre']) && !empty($_POST['precio_min']) && !empty($_POST['precio_max'])){

        // Se valida si el precio entra en el rango establecido en el equipo
        if ($_POST['precio_min'] >= $equipo->precio_min && $_POST['precio_max'] <= $equipo->precio_max){

            // Guarda nuevo articulo
            $Articulo = new Articulo();
            $Articulo->setNombre($_POST["nombre"]);
            $Articulo->setPrecioMin($_POST['precio_min']);
            $Articulo->setPrecioMax($_POST['precio_max']);

            $idarticulo = $DaoArticulo->add($Articulo);

        } else {
            echo json_encode(array('status' => false, 'msg' => 'El rango de precios no entra en en rango1 establecido para el intercambio de este equipo', 'class'=>'danger'));
            exit;
        }

      } else {
        if(isset($_POST['idarticulo'])){

            // Se obtiene rango de precios del articulo y se valida
            $Articulo = $DaoArticulo->getById($_POST['idarticulo']);

            // Se valida si el precio entra en el rango establecido en el equipo
            if ($Articulo->precio_min >= $equipo->precio_min && $Articulo->precio_max <= $equipo->precio_max){

                $idarticulo =  $Articulo->idarticulo;

            }else {
                echo json_encode(array('status' => false, 'msg' => 'El rango de precios no entra en en rango2 establecido para el intercambio de este equipo', 'class'=>'danger'));
                exit;
            }
        }
      }

      // Usuario Has Articulo
      $DaoUsuarioHasArticulo = new DaoUsuarioHasArticulo();
      $UsuarioHasArticulo = new UsuarioHasArticulo();
      $UsuarioHasArticulo->setUsuarioIdusuario( $_POST['idusuario'] );
      $UsuarioHasArticulo->setArticuloIdarticulo( $idarticulo );
      $UsuarioHasArticulo->setPromedio(5);

      // Se obtiene el total de articulos para el usuario
      $countUsuariohasarticulo = $DaoUsuarioHasArticulo->getCountByIdusuarioIdarticulo($UsuarioHasArticulo);

      // Si ya existen
      if(count($countUsuariohasarticulo) > 0){

        $countUsuariohasarticulo = $countUsuariohasarticulo[0]['count'] + 1;

        // Si no ha superado el límite establecido para el equipo
        if($countUsuariohasarticulo <= $articulos_max){
            // Se crea registro
            $idUsuarioHasArticulo = $DaoUsuarioHasArticulo->add($UsuarioHasArticulo);

            // Si la inserción fue correcta
            if(is_numeric($idUsuarioHasArticulo)){
                echo json_encode(array('status' => true, 'msg' => 'Se agrego correctamente tu registro', 'class'=>'success'));
            } else {
                echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'warning'));
            }

        } else {
            // Si ha superado el límite
            echo json_encode(array('status' => false, 'msg' => "Solo se permiten máximo $articulos_max sugerencias para cada miembro del equipo", 'class'=>"warning"));
        }

      } else {
            // Si es un nuevo registro
            $idUsuarioHasArticulo = $DaoUsuarioHasArticulo->add($UsuarioHasArticulo);

            // Si la inserción fue correcta
            if(is_numeric($idUsuarioHasArticulo)){
                echo json_encode(array('status' => true, 'msg' => 'Se agrego correctamente tu registro', 'class'=>'success'));
            } else {
                echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'warning'));
            }
      }
    
  break;

  case "allForSelect":

      $Articulo = new Articulo();
      $Articulo->setPrecioMin(str_replace([",",".","'"],"",$_POST['precio_min']));
      $Articulo->setPrecioMax(str_replace([",",".","'"],"",$_POST['precio_max']));

      echo json_encode( $DaoArticulo->getAllByPriceRange($Articulo) );
  break;

  case "allForRadios":

      $Articulo = new Articulo();
      $Articulo->setPrecioMin(str_replace([",",".","'"],"",$_POST['precio_min']));
      $Articulo->setPrecioMax(str_replace([",",".","'"],"",$_POST['precio_max']));

      echo json_encode( $DaoArticulo->getAllByPriceRange($Articulo) );
  break;

  case "allForMe":
      echo json_encode( $DaoArticulo->getAllByUserId($_SESSION["idusuario"]) );
  break;

  case "delete":

      if(!isset($_SESSION['idusuario'])){
        exit;
      }

        // Elimina usuario has articulo
        $DaoUsuarioHasArticulo = new DaoUsuarioHasArticulo();
        $UsuarioHasArticulo = new UsuarioHasArticulo();
        $UsuarioHasArticulo->setUsuarioIdusuario($_POST["idusuario"]);
        $UsuarioHasArticulo->setArticuloIdarticulo($_POST["idarticulo"]);
        $eliminado = $DaoUsuarioHasArticulo->deleteByUserIdAndArticuloId($UsuarioHasArticulo);

        if($eliminado){
            echo json_encode(array('status' => true, 'msg' => 'Se eliminó correctamente tu registro', 'class'=>'success'));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'error'));
        }

  break;

  case "edit":
  break;

  case "update":

      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }


        $Articulo = new Articulo();
        $Articulo->setIdarticulo($_POST["idarticulo"]);        
        $Articulo->setNombre($_POST["nombre"]);        
        $Articulo->setPrecioMin($_POST['precio_min']);
        $Articulo->setPrecioMax($_POST['precio_max']);

        $id = $DaoArticulo->update($Articulo);
        if(is_numeric($id)){
            echo json_encode(array('status' => true, 'msg' => 'Se actualizo correctamente tu registro', 'class'=>'success', 'data'=>$id));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'error'));
        }
  break;

  case "save":

      if($_SESSION['idrol'] !== "LIDER"){
        exit;
      }

        $Articulo = new Articulo();
        $Articulo->setNombre($_POST["nombre"]);        
        $Articulo->setPrecioMin($_POST['precio_min']);
        $Articulo->setPrecioMax($_POST['precio_max']);
        $id = $DaoArticulo->add($Articulo);

        if(is_numeric($id)){
            echo json_encode(array('status' => true, 'msg' => 'Se agrego correctamente tu registro', 'class'=>'success', 'data'=>$id));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Error', 'class'=>'error'));
        }
  break;


}


