<?php
$id_pedido = $_POST["id_pedido"];
$id_usuario = $_POST["id_usuario"];
$estado_envio = $_POST["estado_envio"];
$precio_pedido = $_POST["precio_pedido"];

mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto3_tienda") or die("Error conecting to db.");

$SQL = "UPDATE pedidos SET id_pedido='$id_pedido', id_usuario='$id_usuario', estado_envio='$estado_envio', precio_pedido='$precio_pedido' WHERE id_pedido='$id_pedido';";

mysql_query($SQL) or die("Couldn t execute query." . mysql_error());


//Construyo un objeto json que indica que todo va bien, tengo que indicar que recibo json en el archivo index
//$datos = array('codigo' => "OK, todo ha ido bien ACTUALIZADO");
//header("Content-type: application/json");
//echo json_encode($id_categoria);
?>



