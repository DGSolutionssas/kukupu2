<?php

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    require_once('./VideosDA.php');
    $db=new VideosDA();
    
    switch($action) {
        case 'obtenerVideos' :
            $videos=$db->obtenerVideos();
            $arrayVideos = array();
            for ($i = 0; $i < count($videos); $i++) 
            {
                $arrayVideos[$i]['idVideo'] = $videos[$i]['idVideo'];
                $arrayVideos[$i]['TituloVideo']= $videos[$i]['TituloVideo'];
                $arrayVideos[$i]['DescripcionVideo']= $videos[$i]['DescripcionVideo'];
                $arrayVideos[$i]['Url']= $videos[$i]['Url'];
            }
            echo json_encode($arrayVideos);
        break;
        case 'eliminarVideo':
            $videos=$db->eliminarVideo($_POST['idVideo']);
            echo '{"error": "2", "descripcion": "Se elimino correctamente el Video"}';
        break;
        case 'registrarVideo':
            $videos=$db->guardarVideo($_POST['txtTituloVideo'],$_POST['txtDescripcionVideo'],$_POST['txtUrl']);
        break;
       
    }
}