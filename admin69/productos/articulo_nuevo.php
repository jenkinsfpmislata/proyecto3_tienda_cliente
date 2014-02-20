<?php

$id_producto = $_POST["id_producto"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$id_categoria = $_POST["id_categoria"];
$tipo_producto = $_POST["tipo_producto"];


mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto3_tienda") or die("Error conecting to db.");

$SQL = "INSERT INTO productos (id_producto, nombre, descripcion, precio, id_categoria, tipo_producto) VALUES ($id_producto, '$nombre', '$descripcion', $precio, $id_categoria, '$tipo_producto');"; //numericos sin comillas

mysql_query($SQL) or die("Couldn t execute query." . mysql_error());



//Construyo un objeto json que indica que todo va bien, tengo que indicar que recibo json en el archivo index
//$datos = array('codigo' => "OK, todo ha ido BIEN");
header("Content-type: application/json");
//echo json_encode($datos);
echo json_encode($id_categoria);
?>