<?php
 
$codigo = $_POST['documento'];
$pnombre = $_POST['nombre1'];
$snombre = $_POST['nombre2'];
$papellido = $_POST['apellido1'];
$sapellido = $_POST['apellido2'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['mail'];
 
 
include("conexion.php");

$result = mysql_query("UPDATE clientes SET nombre = '$pnombre', nombre2 ='$snombre', apellido='$papellido', apellido2='$sapellido', direccion='$direccion', telefono='$telefono',mail='$correo' where codigo ='$codigo'");
header("location: ../listacli.php");

