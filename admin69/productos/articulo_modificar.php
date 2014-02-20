<?php

$id_producto = $_GET["id_producto"];

$db = mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto3_tienda") or die("Error conecting to db.");

$SQL = "SELECT * from productos WHERE id_producto=$id_producto;";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());
//$datos[];
$i = 0;
while ($fila = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $datos[$i] = array('id_producto' => $fila["id_producto"], 'nombre' => $fila["nombre"], 'descripcion' => $fila["descripcion"], 'precio' => $fila["precio"], 'id_categoria' => $fila["id_categoria"], 'tipo_producto' => $fila["tipo_producto"]);
    // son los datos que cojo de la bbdd 
    $i++;
}

header('Content-type: application/json');
echo json_encode($datos);
?>