<?php
 
$codigo = $_POST['documento'];
$pnombre = $_POST['nombre1'];
$snombre = $_POST['nombre2'];
$papellido = $_POST['apellido1'];
$sapellido = $_POST['apellido2'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['mail'];
//$estado = $_POST['estado'];
 
if ($_POST['estado']=="Activo") {
	$bit = true;
}else{
	$bit = false;
}
include("conexion.php");

$result = mysql_query("UPDATE meseros SET nombre = '$pnombre', nombre2 ='$snombre', apellido='$papellido', apellido2='$sapellido',telefono='$telefono', direccion='$direccion', mail='$correo', estado='$bit' WHERE codigo ='$codigo'");
//echo $estado;
//echo $bit;
header("location: ../listamesero.php");

