<?php
if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    require_once('./GaleriasDA.php');
    $db=new GaleriasDA();

    switch($action) {
        case 'obtenerGalerias' :
            $galerias=$db->obtenerGalerias();
            $arrayGalerias = array();
            for ($i = 0; $i < count($galerias); $i++)
            {
                $arrayGalerias[$i]['idGaleria'] = $galerias[$i]['idGaleria'];
                $arrayGalerias[$i]['TituloGaleria']= $galerias[$i]['TituloGaleria'];
                $arrayGalerias[$i]['Url']= $galerias[$i]['Url'];
                $arrayGalerias[$i]['activo']= $galerias[$i]['activo'];
            }
            echo json_encode($arrayGalerias);
        break;
        case 'eliminarGaleria':
            $galerias=$db->eliminarGaleria($_POST['idGaleria']);
            echo '{"error": "2", "descripcion": "Se elimino correctamente la Galeria"}';
        break;
        case 'registrarGaleria':
            $galerias=$db->guardarGaleria($_POST['txtTituloGaleria'],$_POST['txtUrl'], $_POST['activo']);
        break;

    }
}
