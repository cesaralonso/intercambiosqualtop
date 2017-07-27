<?php
require_once('Cnn.php');

class base extends cnn {

    public function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        $theValue = function_exists("real_escape_string") ? $this->_cnn->real_escape_string($theValue) : $this->_cnn->real_escape_string($theValue);
        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }



    public function hashPassword($password) {
        $salt = "mdsksprwuhej6skhs0b08ojx6";
        //encrypt the password, rotate characters by length of original password
        $len = strlen($password);
        $password = md5($password);
        $password = $this->rotateHEX($password, $len);
        return md5($salt . $password);
    }

    public function rotateHEX($string, $n) {
        //for more security, randomize this string
        $chars = "4hxdxsyx3fkygsg8";
        $str = "";
        for ($i = 0; $i < strlen($string); $i++) {
            $pos = strpos($chars, $string[$i]);
            $pos += $n;
            if ($pos >= strlen($chars))
                $pos = $pos % strlen($chars);
            $str.=$chars[$pos];
        }
        return $str;
    }

    public function formatFecha($fechaSQL, $corta = 0) {
        $anioSQL = substr($fechaSQL, 0, 4);
        $mesSQL = substr($fechaSQL, 5, 2);
        $mesSQL = $mesSQL * 1;
        $mesSQL = $this->mesLetra($mesSQL);
        $diaSQL = substr($fechaSQL, 8, 2);
        $diaSQL = $diaSQL * 1;
        if ($corta == 0) {
            return ($diaSQL . " de " . $mesSQL . ", " . $anioSQL);
        } else {
            return ($diaSQL . " " . $mesSQL . ", " . substr($anioSQL, 2, 2));
        }
    }

    public function formatFecha_hora($fechaSQL) {
        $fecha = $this->formatFecha($fechaSQL);
        return $fecha = $fecha . substr($fechaSQL, strpos($fechaSQL, ' '));
    }

    public function mesLetra($mesActual) {
        if ($mesActual == 1) {
            return("Ene");
        }
        if ($mesActual == 2) {
            return("Feb");
        }
        if ($mesActual == 3) {
            return("Mar");
        }
        if ($mesActual == 4) {
            return("Abr");
        }
        if ($mesActual == 5) {
            return("May");
        }
        if ($mesActual == 6) {
            return("Jun");
        }
        if ($mesActual == 7) {
            return("Jul");
        }
        if ($mesActual == 8) {
            return("Ago");
        }
        if ($mesActual == 9) {
            return("Sep");
        }
        if ($mesActual == 10) {
            return("Oct");
        }
        if ($mesActual == 11) {
            return("Nov");
        }
        if ($mesActual == 12) {
            return("Dic");
        }
    }

    public function generarKey($largo = 13) {
        $var_count = 0;
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        $str="";
        srand((double) microtime() * 1000000);
        while ($var_count < $largo) {
            $num = rand() % 33;
            $str.=substr($chars, $num, 1);
            $var_count = $var_count + 1;
        }
        return($str);
    }


    public function calcularEdad($fecha_nacimiento) {
        list($y, $m, $d) = explode("-", $fecha_nacimiento);
        $y_dif = date("Y") - $y;
        $m_dif = date("m") - $m;
        $d_dif = date("d") - $d;
        if ((($d_dif < 0) && ($m_dif == 0)) || ($m_dif < 0))
            $y_dif--;
        return $y_dif;
    }

    public function mesActual($mesActual) {
        if ($mesActual == 1) {
            return("Enero");
        }
        if ($mesActual == 2) {
            return("Febrero");
        }
        if ($mesActual == 3) {
            return("Marzo");
        }
        if ($mesActual == 4) {
            return("Abril");
        }
        if ($mesActual == 5) {
            return("Mayo");
        }
        if ($mesActual == 6) {
            return("Junio");
        }
        if ($mesActual == 7) {
            return("Julio");
        }
        if ($mesActual == 8) {
            return("Agosto");
        }
        if ($mesActual == 9) {
            return("Septiembre");
        }
        if ($mesActual == 10) {
            return("Octubre");
        }
        if ($mesActual == 11) {
            return("Noviembre");
        }
        if ($mesActual == 12) {
            return("Diciembre");
        }
    }

    public function advancedQuery($query){
            $resp=array();
            $consulta=$this->_cnn->query($query);
            if(!$consulta){
              throw   new  Exception("Error al consultar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
            }else{
                $row_consulta= $consulta->fetch_assoc();
                $totalRows_consulta= $consulta->num_rows;
                        if($totalRows_consulta>0){
                               do{
                                  array_push($resp, $row_consulta);
                           }while($row_consulta= $consulta->fetch_assoc());
                        }
            }
            return $resp;
    }

    //Funcion para recorrer las celdas
    public function xrange($start, $end, $limit = 1000) {
        $l = array();
        while ($start !== $end && count($l) < $limit) {
            $l[] = $start;
            $start ++;
        }
        $l[] = $end;
        return $l;
    }


    public function getTotalRows($query) {
        $consulta = $this->_cnn->query($query);
        if(!$consulta){
             throw new Exception("Error al insertar: (" . $this->_cnn->errno . ") " . $this->_cnn->error);
        }else{
             $row_consulta = $consulta->fetch_assoc();
        }
        $totalRows_consulta= $consulta->num_rows;

        return $totalRows_consulta;
    }

    public function covertirCadena($texto,$tipo){
            if($tipo==0){
                //Minusculas
                $cadena=mb_strtolower ($texto,"UTF-8");
            }elseif($tipo==1){
                //Mayusculas
                $cadena=mb_strtoupper($texto,"UTF-8");
            }elseif($tipo==2){
                $cadena = ucfirst(mb_strtolower($texto,"UTF-8"));
                //$bar = ucfirst(strtolower($bar)); // Hello world!
            }
            return $cadena;
    }

    public function getDiasRango($FechaIni,$FechaFin){
         //Fecha de inicio y fin de ciclo
        $fechas=array();
        $fechaInicio=strtotime($FechaIni);
        $fechaFin=strtotime($FechaFin);
        //Recorremos el rango de dias del ciclo para saber cuantos meses hay
        for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                  $day=date('Y-m-d', $i);
                  array_push($fechas, $day);
        }
        return $fechas;
    }


    public function getDiaMasDias($Fecha,$numDias){
        $Y=date("Y",strtotime($Fecha));
        $m=date("m",strtotime($Fecha));
        $d=date("d",strtotime($Fecha));
        $diaNuevo=date("Y-m-d",mktime(0, 0, 0, $m, $d+$numDias, $Y));
        return $diaNuevo;
    }

    /*
    * HERE COMES NEW CHALLENGER
    * @author Job Celaya
    */
    public function getAllRows($query = ''){
      if ( $results = @$this -> _cnn -> query($query) ) {
        $rows = array ( );
        while ( $fields = $results -> fetch_assoc ( ) ) {
          $rows [ ] = $fields;
        }
        $results -> close ( );
        return $rows;
      }
      return false;
    }
    public function getOneRow ( $sql ) {
      if ( $results = @$this -> _cnn -> query ( $sql ) ) {
        if ( $fields = $results -> fetch_assoc ( ) ) {
          $results -> close ( );
          return $fields;
        }
        return false;
      }
      return false;
    }
    public $response = array(
      'msg' 		=> null,		// Algun mensaje específico.
      'status' 	=> true,
      'class'		=> null			// success, fail.
    );
}
