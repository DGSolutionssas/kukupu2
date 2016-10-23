<?php
    $return = Array("ok"=>TRUE);
    $upload_folder ="uploads";
    $nombre_archivo = $_FILES["archivo"]["name"];
    $tipo_archivo = $_FILES["archivo"]["type"];
    $tamano_archivo = $_FILES["archivo"]["size"];
    $tmp_archivo = $_FILES["archivo"]["tmp_name"];
    $archivador = $upload_folder . "/" . $nombre_archivo;

    echo $archivador;

    $type = pathinfo($archivador,".png");
    $data = file_get_contents($archivador);

    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    if (!move_uploaded_file($tmp_archivo, $archivador))
    {
        $return = Array("ok" => FALSE, "msg" => "Ocurrio un error al subir el archivo. No pudo guardarse.", "status" => "error");
    }
    echo json_encode($return);
