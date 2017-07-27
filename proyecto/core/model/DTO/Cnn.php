<?php
//error_reporting(E_ALL); 
class cnn {
    private $_hostname = "localhost";
    private $_username = "root";
    private $_password = "";
    protected $_database = "intercambioschidos";
    protected $_cnn = "";

    public function __construct() {
        try{
                if ($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "127.0.0.1") {
                    $this->_password = "";
                } else {
                    $this->_password = "Mysql123!!!";
                }
                $this->_cnn = new mysqli($this->_hostname, $this->_username, $this->_password, $this->_database);
                $this->_cnn->query("SET NAMES 'utf8'");
        }catch (Exception $e) {
                echo "Fallo la conexion de la bdd: (" . $this->_cnn->connect_errno . ") " . $this->_cnn->connect_error;
        }
        date_default_timezone_set('America/Mexico_City');
    }

    public function close_cnn() {
        $this->_cnn->close();
    }
    
}
