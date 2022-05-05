<?php
$usuario = $_POST['nombre'];
$pass = $_POST['contrasena'];

$passencripted = base64_encode($pass);
 
include("conexion.php");

$result = mysql_query("SELECT * from usuarios where nombre ='" . $usuario . "' AND estado ='1'");
 
if($row = mysql_fetch_array($result)){
	if($row['contrasena'] == $passencripted){
		session_start();
		$_SESSION['nombre'] = $usuario;
		$_SESSION['cod']=$row['codigo'];
		$_SESSION['rol']=$row['rol'];
		header("Location: ../inicio_usuario.php");
		}else{
		echo "<script language='JavaScript'> 
             alert('Datos Errones o Estado Desactivado'); 
             location.href='../index.php';</script>";	
		}
}else{
	echo "<script language='JavaScript'> 
          alert('Datos Errones o Estado Desactivado'); 
          location.href='../index.php';
          </script>";
}
?>