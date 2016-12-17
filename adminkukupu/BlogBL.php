<?php
if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    require_once('./BlogDA.php');
    $db=new BlogDA();

    switch($action) {
        case 'obtenerBlog' :
            $blogs=$db->obtenerBlog();
            $arrayblogs = array();
            for ($i = 0; $i < count($blogs); $i++)
            {
                $arrayblogs[$i]['idBlog'] = $blogs[$i]['idBlog'];
                $arrayblogs[$i]['titulo_blog']= $blogs[$i]['titulo_blog'];
                $arrayblogs[$i]['texto_blog']= $blogs[$i]['texto_blog'];
                $arrayblogs[$i]['fecha_blog']= $blogs[$i]['fecha_blog'];
				$arrayblogs[$i]['Nombre']= $blogs[$i]['Nombre'];
				$arrayblogs[$i]['activo_blog']= $blogs[$i]['activo_blog'];
				
            }
            echo json_encode($arrayblogs);
        break;
        case 'eliminarBlog':
            $blogs=$db->eliminarBlog($_POST['idBlog']);
            echo '{"error": "2", "descripcion": "Se elimino correctamente el Blog"}';
        break;
        case 'registrarBlog':
            $blogs=$db->guardarBlog($_POST['txtTituloBlog'],$_POST['txtTextoBlog'], $_POST['activo']);
        break;

    }
}
