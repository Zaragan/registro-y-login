<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "subastausers";
	private $conexion;
    
    public function __construct(){
        $this->conexion = new mysqli($this->host,$this->username,$this->password,$this->db);
        $this->conexion->set_charset("utf8");
        if ($this->conexion->connect_errno) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
            exit;
        }   
    }

    public function setQuery($query){
		return mysqli_query($this->conexion, $query);
	}

    public function __destruct(){
        @mysqli_close($this->conexion);
    }
};
?>
