<?php
 
$usuario = $_POST['documento'];
$name = $_POST['nombre'];
$estado = $_POST['estado'];
$rol =$_POST['rol'];
$correo =$_POST['mail'];

 
include("conexion.php");

if ($estado == "Activo") {
	$bit = true;
}else{
	$bit=false;
}

$result = mysql_query("UPDATE usuarios SET nombre = '$name', estado='$bit', rol='$rol',mail='$correo' where codigo ='$usuario'");
header("location: ../listaru.php");
 
