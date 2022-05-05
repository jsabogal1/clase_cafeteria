<?php
 
$usuario = $_POST['documento'];
$name = $_POST['nombre'];
$correo = $_POST['mail'];


 
include("conexion.php");

$result = mysql_query("UPDATE usuarios SET nombre = '$name',mail='$correo' where codigo ='$usuario'");
session_start();
$_SEESION['nombre'] = $name;
header("location: ../modifica.php");
 
