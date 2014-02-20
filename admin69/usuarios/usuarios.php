<?php

    $db = mysql_connect("localhost","root","frodo2013") or die("Connection Error: " . mysql_error());
    mysql_select_db("proyecto3_tienda") or die("Error conecting to db.");
    
	$SQL = "SELECT * from usuarios;"; 
    $result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
	//$datos[];
	$i=0;
    while($fila = mysql_fetch_array($result,MYSQL_ASSOC)) 
	{
		$datos[$i]=array(
                    'id_usuario'=>$fila["id_usuario"],
                    'nombre'=>$fila["nombre"],
                    'apellidos'=>$fila["apellidos"],
                    'mail'=>$fila["mail"]
                    );
		$i++;
	}
		
	header('Content-type: application/json');
	echo json_encode($datos);
	
?>