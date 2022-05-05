<?php
include("conexion.php");

$codigo = $_POST['documento'];
$nombre = $_POST['nombre1'];
$correo = $_POST['mail'];
$contra1 = $_POST['contrasena1'];
$contra2 = $_POST['contrasena2'];
$rol = $_POST['rol'];
$estado = $_POST['estado'];
	if($estado == "activo"){
		$estado = 1;
	}else{
		$estado = 0;
	}

	if ($contra1 == $contra2){
		$encriptar = base64_encode($contra1);
		$sql="INSERT INTO usuarios (codigo,nombre,contrasena,estado,rol,mail) VALUES ('$codigo','$nombre','$encriptar','$estado','$rol','$correo')";
		$res=mysql_query($sql);
			if ($res != "true"){
				
				echo"<script language='JavaScript'> 
              	alert('Ups tuvimos Problemas al guardar los datos'); 
               	location.href='../insertarusuario.php';
               	</script>";
			}else{
				echo"<script language='JavaScript'> 
                alert('Datos guardados Correctamente'); 
                location.href='../insertarusuario.php';
                </script>";
			}
	}else{
		echo"<script language='JavaScript'> 
                alert('las Contraseñas no concuerdan'); 
                location.href='../insertarusuario.php';
                </script>";
	}
		
