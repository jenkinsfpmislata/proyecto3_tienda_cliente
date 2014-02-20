<?php
$id_usuario = $_POST["id_usuario"];
$apellidos = $_POST["apellidos"];
$password = $_POST["password"];
$mail = $_POST["mail"];
$codigo_postal = $_POST["codigo_postal"];
$direccion = $_POST["direccion"];
$ciudad = $_POST["ciudad"];
$provincia = $_POST["provincia"];
$nombre = $_POST["nombre"];

mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto3_tienda") or die("Error conecting to db.");

$SQL = "UPDATE usuarios SET id_usuario=$id_usuario, nombre='$nombre', apellidos='$apellidos', password='$password', mail='$mail', codigo_postal='$codigo_postal', direccion='$direccion', ciudad='$ciudad', provincia='$provincia', nombre='$nombre' WHERE id_usuario=$id_usuario;";

mysql_query($SQL) or die("Couldn t execute query." . mysql_error());


//Construyo un objeto json que indica que todo va bien, tengo que indicar que recibo json en el archivo index
//$datos = array('codigo' => "OK, todo ha ido bien ACTUALIZADO");

//header("Content-type: application/json");
//echo json_encode($id_usuario);
?>



