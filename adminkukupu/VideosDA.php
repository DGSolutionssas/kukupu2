<?php

class VideosDA {
  private $db;

    function __construct() {
        require_once './Connect.php';
        $this->db = new Connect();
    }

    function __destruct() {
    }


	public function obtenerVideos()
	{
        $resul=mysqli_query($this->db->Connect(),"SELECT idVideo,TituloVideo,DescripcionVideo,Url FROM appvideos");
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

    public function eliminarVideo($idVideo)
    {
        $resul=mysqli_query($this->db->Connect(),"DELETE FROM appvideos WHERE idVideo=".$idVideo);
    }

    public function guardarVideo($txtTituloVideo, $txtDescripcionVideo, $txtUrl)
    {
        $resul=mysqli_query($this->db->Connect(),"INSERT INTO appvideos (TituloVideo, DescripcionVideo, Url) VALUES ('" . $txtTituloVideo . "','" . $txtDescripcionVideo . "','" . $txtUrl . "')");
    }
}
