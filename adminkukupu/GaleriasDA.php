<?php

class GaleriasDA {
  private $db;

    function __construct() {
        require_once './Connect.php';
        $this->db = new Connect();
    }

    function __destruct() {
    }


	public function obtenerGalerias()
	{
        $resul=mysqli_query($this->db->Connect(),"SELECT idGaleria,TituloGaleria,Url FROM galerias");
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

    public function eliminarGaleria($idGaleria)
    {
        $resul=mysqli_query($this->db->Connect(),"DELETE FROM Galerias WHERE idGaleria=".$idGaleria);
    }

    public function guardarGaleria($txtTituloGaleria, $txtUrl)
    {
      echo $txtUrl;
      $resul=mysqli_query($this->db->Connect(),"INSERT INTO Galerias (TituloGaleria, Url) VALUES ('" . $txtTituloGaleria . "','"  . $txtUrl . "')");
    }
  }
