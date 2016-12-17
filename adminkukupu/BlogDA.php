<?php
session_start();
class BlogDA {
  private $db;

    function __construct() {
        require_once './Connect.php';
        $this->db = new Connect();
    }

    function __destruct() {
    }


	public function obtenerBlog()
	{
        $resul=mysqli_query($this->db->Connect(),"select b.idBlog, b.titulo_blog, b.texto_blog, b.fecha_blog, u.Nombre, b.activo_blog from blog b inner join usuario u on b.idUsuario_posted = u.idUsuario");
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

    public function eliminarBlog($idBlog)
    {
        $resul=mysqli_query($this->db->Connect(),"DELETE FROM Blog WHERE idBlog=".$idBlog);
    }

    public function guardarBlog($txtTituloBlog, $txtTextoBlog, $activo)
    {
		$idUsuarioPosted = $_SESSION['idUsuario'];
		$fechaBlog = date("Y-m-d H:i:s");
      echo $fechaBlog;
      //$resul=mysqli_query($this->db->Connect(),"INSERT INTO Galerias (TituloGaleria, Url, activo) VALUES ('" . $txtTituloGaleria . "','"  . $txtUrl . "'," . $activo .")");
      $resul=mysqli_query($this->db->Connect(),"INSERT INTO blog(titulo_blog,texto_blog,fecha_blog,idUsuario_posted,activo_blog)VALUES('".$txtTituloBlog."','".$txtTextoBlog."','".$fechaBlog."',".$idUsuarioPosted.",".$activo.")");
	  
	}
  }
