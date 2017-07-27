<?php

// Core.php
// @description obtiene las configuraciones, muestra y carga los contenidos necesarios.

class Core {

	public static function includeCSS(){
		$path = "res/css/";
		$handle=opendir($path);
		if($handle){
			while (false !== ($entry = readdir($handle)))  {
				if($entry!="." && $entry!=".."){
					$fullpath = $path.$entry;
				if(!is_dir($fullpath)){
						echo "<link rel='stylesheet' type='text/css' href='".$fullpath."' />";

					}
				}
			}
		closedir($handle);
		}

	}

	public static function llave(){
		
		//$str = "abcdefghijklmopqrstuvwxyz1234567890";
		$str = "1234567890";
		$llave = "";
		for ($i=0; $i < 4; $i++) { 
			$llave .= $str[rand(0,strlen($str)-1)];
		}
		return $llave;

	}


	/*
	 * Recibe una variable y la imprime INSITE.
	 *
	 * Ademas indica nombre de archivo y linea donde ha sido llamado.
	 * */

	public static function debug ( $var, $html = true, $backtrace = null ) {

		$id = uniqid ( );

		if ( is_null ( $backtrace ) )
			$backtrace = debug_backtrace ( );

		$debug = "<div id='$id'>" . "<code class=''>" . "<strong>FILE: " . $backtrace [ 0 ] [ 'file' ] . "</strong>" . "<BR />" . PHP_EOL . "<strong>LINE: " . $backtrace [ 0 ] [ 'line' ] . "</strong>" . "<BR />" . PHP_EOL . "<pre>";

		ob_start ( );
		print_r ( $var );
		$dump = ob_get_clean ( );
		$debug .= htmlentities ( $dump );
		$debug .= "</pre>" . "</code>" . "</div>";

		if ( !$html )
			$debug = strip_tags ( $debug );

		echo $debug;
	}

	/**
	 * BreakPoint
	 *
	 * Depura el contenido de una variable y depura el valor llamado.
	 *
	 * Ahora se puede seleccionar si se desea que se muestre el código fuente de una funcion o si no.
	 *
	 * @Version 1.1
	 * @Date 18/09/2015
	 */
	public static function breakpoint ( $var, $show_source = false ) {
		$break = debug_backtrace ( );
		self::debug ( $var, true, $break );
		if ( isset ( $this ) )
			unset ( $this );
		if($show_source)
			show_source ( $break [ 0 ] [ 'file' ] );
		die ( 'Fin del Brakepoint: ' . date('Y-m-d H:i:s'));

	}

	public static function json ( $data, $debug = false ) {
		if ( $debug ) {
			echo "<pre>";
			print_r($data);
			echo "</pre>";
		} else {
			if (is_null($data ) or !is_array ($data)){
			$this -> set_404 ( );
			}
			if (!headers_sent ( )){
			header('Content-type: application/json');
			}
			echo json_encode ($data);
		}
		die();
	}

	// Devuelve arreglos no repetidos por la llave $key
	public static function unique_multidim_array($array, $key) {
		$temp_array = array();
		$i = 0;
		$key_array = array();
		
		foreach($array as $val) {
			if (!in_array($val[$key], $key_array)) {
				$key_array[$i] = $val[$key];
				$temp_array[$i] = $val;
			}
			$i++;
		}
		return $temp_array;
	} 

	// Devuelve arreglos no repetidos por la llave $key, exceptuando listado de $key_current
	public static function unique_multidim_array_except($array, $key,$key_current) {
		$temp_array = array();
		$i = 0;
		$key_array = array();
		
		foreach($array as $val) {
			if (!in_array($val[$key], $key_array)  &&  !in_array($val[$key], $key_current) ) {
				$key_array[$i] = $val[$key];
				$temp_array[$i] = $val;
			}
			$i++;
		}
		return $temp_array;
	} 

	// Envía email con plantilla BiHaiv
	public static function mail($emailto,$subject,$body,$altbody){

		$url = APP_PATH;

		// Plantilla
		$template = "$body";

		$mail = new PHPMailer();
		$mail->CharSet = 'UTF-8';
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'mail.syesoftware.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'no-reply@syesoftware.com';                 // SMTP username
		$mail->Password = 'Syesoftware2015';                           // SMTP password
		$mail->Port = 26;                                    // TCP port to connect to
		$mail->setFrom('no-reply@syesoftware.com', 'Intercambios Qualtop Group');
		$mail->addAddress($emailto);               // Name is optional
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $template;
		$mail->AltBody = strip_tags($altbody);

		if(!$mail->send()) {
		    return 'EL mensaje no pudo enviarse. Error: ' . $mail->ErrorInfo;
		} else {
		    return 'El mensaje ha sido enviado';
		}
	}

	public static function redir($url){
		echo "<script>window.location='".$url."';</script>";
	}

	public static function goBack($num){
		echo "<script>window.history.go(-".$num.");</script>";
	}

	public static function alert($text){
		echo "<script>alert('".$text."');</script>";
	}

	public static function includeJS($file = null){
		$path = "assets/js/";

		$handle=opendir($path);
		if($handle){
			if ($file!==null) {
				if (false !== ($entry = readdir($handle)))  {
					$fullpath = APP_PATH.$path.$entry;
					echo "<script type='text/javascript' src='".$fullpath."'></script>";
				}
			}
			else{
				while (false !== ($entry = readdir($handle)))  {
					if($entry!="." && $entry!=".."){
						$fullpath = APP_PATH.$path.$entry;
					if(!is_dir($fullpath)){
							echo "<script type='text/javascript' src='".$fullpath."'></script>";

						}
					}
				}
			}
		closedir($handle);
		}

	}

}

?>
