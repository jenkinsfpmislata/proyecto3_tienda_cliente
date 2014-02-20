<?php

session_start();

$mail = $_POST["mail"];
$password = $_POST["password"];

//conexion a DB
$db = mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto3_tienda") or die("Error conecting to db.");

$SQL = "SELECT * from usuarios where nombre like 'root' AND password like '$password' AND mail LIKE '$mail';";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());
//end conection
$resultadoConsulta = mysql_num_rows($result);
//datos

if ($resultadoConsulta == 1) {
    $_SESSION["root"] = "admin";
    header('Location:dashboard.php');
}
else {
    header('Location:loginerror.html');
}
?>