<?php

//Conexion a la DB
	$link = mysql_connect('localhost','root','1234567890') or die('No fue posible conectarse a la DB');
	mysql_select_db('kukupuWeb',$link) or die('Seleccione una DB Valida');

//Obtener Videos de la DB
	$query = "SELECT B.idblog as idBlog, B.titulo_blog, B.texto_blog, B.fecha_blog, B.idUsuario_posted, B.idGaleria_posted, U.Nombre from blog B
inner join usuario U ON B.idUsuario_posted=U.idUsuario";
	$result = mysql_query($query,$link) or die('Errant query:  '.$query);

//Recorriendo los registros
	$blogs = array();
	if(mysql_num_rows($result)) {
		while($blog = mysql_fetch_assoc($result)) {
			$blogs[] = array('blog'=>$blog);
		}
	}

	//Retornando en Formato JSON
		//header('Content-type: application/json');
    echo $_GET['callback']."(".json_encode(array('blogs'=>$blogs)).");";

//Desconectando de la DB
@mysql_close($link);
