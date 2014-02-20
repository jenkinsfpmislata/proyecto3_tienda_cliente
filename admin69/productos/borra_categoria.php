<?php

$id=$_GET["id"];

$db=mysql_connect("localhost","root","frodo2013") or die ("Connection Error" .mysql_error());


mysql_select_db("proyecto3_tienda") or die ("Error conecting to db.");


$SQL = "DELETE FROM articulos WHERE codigo LIKE '$id'";

//echo "Se ha borrado correctamente=> $SQL ";

$result=mysql_query( $SQL ) or die ("Couldnt execute query.".mysql_error());


//echo "<br><a href='Menu.php'>Volver</a>";

//!!!!!!!!!Funcion header no usar nunca con echos en la pagina --- carga instantanea de la pagina
header("location:Menu.php");
?>