<?php

class LoginDA {

    private $db;

    function __construct() {
        require_once './Connect.php';
        $this->db = new Connect();
    }

    function __destruct() {        
    }
    
    public function getExistenciaUsuario($usuario, $contrasena)
	{
        $resul=mysqli_query($this->db->Connect(),"Select us.idUsuario, us.usuario, us.nombre FROM Usuario us WHERE us.Usuario='".trim(addslashes($usuario))."'
		AND us.Pass='".trim($contrasena)."'");
        
        mysqli_set_charset($this->db->connect(), "utf8");
        $jsonData = array();
        $nrows = mysqli_num_rows($resul);

        
        if ($nrows > 0) {
            while ($row = mysqli_fetch_array($resul)) {
                $jsonData[] = $row;
            }
            return $jsonData;
        } else {
            return "";
        }
	}
}