<?php
$id_producto=$_GET["id_producto"];
$id_categoria=$_GET["id_categoria"];

$db=mysql_connect("localhost","root","frodo2013") or die ("Connection Error" .mysql_error());
mysql_select_db("proyecto3_tienda") or die ("Error conecting to db.");
$SQL = "DELETE FROM productos WHERE id_producto LIKE '$id_producto'";
$result=mysql_query( $SQL ) or die ("Couldnt execute query.".mysql_error());
header("Content-type: application/json");
echo json_encode($id_categoria);

?>