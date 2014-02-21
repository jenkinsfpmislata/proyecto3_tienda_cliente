<?php

$mail = $_POST["mail"];
$password = $_POST["password"];
//$id_usuario = $_GET["id_usuario"];
$db = mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto3_tienda") or die("Error conecting to db.");

$SQL = "SELECT * from usuarios WHERE password='$password' and mail='$mail' ;";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());
//$datos[];
$i = 0;
while ($fila = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $datos[$i] = array(
        'id_usuario' => $fila["id_usuario"], 
        'apellidos' => $fila["apellidos"], 
        'nombre' => $fila["nombre"], 
        'mail' => $fila["mail"], 
        'codigo_postal' => $fila["codigo_postal"],
        'provincia' => $fila["provincia"],
        'ciudad' => $fila["ciudad"],
        'direccion' => $fila["direccion"]);
    $i++;
}

header('Content-type: application/json');
echo json_encode($datos);

?>
