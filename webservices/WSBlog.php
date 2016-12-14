<?php

//Conexion a la DB
	$link = mysql_connect('localhost','root','1234567890') or die('No fue posible conectarse a la DB');
	mysql_select_db('kukupuWeb',$link) or die('Seleccione una DB Valida');

//Obtener Videos de la DB
	$query = "SELECT idVideo,TituloVideo,DescripcionVideo,Url FROM Videos";
	$result = mysql_query($query,$link) or die('Errant query:  '.$query);

//Recorriendo los registros
	$videos = array();
	if(mysql_num_rows($result)) {
		while($video = mysql_fetch_assoc($result)) {
			$videos[] = array('video'=>$video);
		}
	}

	//Retornando en Formato JSON
		//header('Content-type: application/json');
    echo $_GET['callback']."(".json_encode(array('videos'=>$videos)).");";

//Desconectando de la DB
@mysql_close($link);
