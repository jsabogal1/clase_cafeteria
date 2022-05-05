<?php
session_start();
include("conexion.php");
 
$usuario = $_SESSION['cod'];
$pass = $_POST['contraac'];
$passencripted = base64_encode($pass); 
$nueva1 = $_POST['contran1'];
$nueva2 = $_POST['contran2'];

$result=mysql_query("SELECT contrasena from usuarios where codigo='$usuario' and estado = '1'");
$row = mysql_fetch_array($result);

if($passencripted == $row['contrasena']){
	if($nueva1 == $nueva2){
		$encript=base64_encode($nueva1);
		$result = mysql_query("UPDATE usuarios SET contrasena = '$encript' where codigo ='$usuario'");
		echo "<script language='JavaScript'> 
             alert('La Contraseña se actualizo'); 
             location.href='../modifica.php';</script>";	
	}else{
		echo "<script language='JavaScript'> 
             alert('No se puedo Actualizar la Contraseña'); 
             location.href='../modifica.php';</script>";	
	}
	
}else{
	echo "<script language='JavaScript'> 
             alert('Digito mal su contraseña'); 
             location.href='../modifica.php';</script>";	
}
 


//$result = mysql_query("UPDATE usuarios SET nombre = '$name' where codigo ='$usuario'");
//header("location: ../modifica.php");
 
