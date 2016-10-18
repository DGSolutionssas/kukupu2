<?php
session_start();
if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    require_once('./LoginDA.php');
    $db=new LoginDA();
    switch($action) {
        case 'iniciarSesion' :
        $logins=$db->getExistenciaUsuario($_POST['txtUsuario'], $_POST['txtContrasena']);
        if ($logins == "") 
        {
            echo json_encode(array('error' => '1','descripcion'=> 'No existe el Usuario'));
        } 
        else 
        {
            $_SESSION['autenticado'] = true;
            $_SESSION['inicioSesion'] = 1;
            $_SESSION['idUsuario'] = $logins[0][0];
            $_SESSION['nombreUsuario'] = $logins[0][1];                
            $_SESSION['idPerfil'] = $logins[0][2];
            
            echo json_encode(array('error' => '2','descripcion'=> 'No existe el Usuario'));
            /*
            $file = fopen("archivo.txt", "a");
              fwrite($file, "La Ruta es : " .$_SERVER['DOCUMENT_ROOT'] . "/AppAdminFeEnAccion/Index.php" . PHP_EOL);
              fclose($file);
            */
        }
        break;
    }
}