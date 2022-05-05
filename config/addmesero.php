<?php
include("conexion.php");

$codigo = $_POST['documento'];
$pnombre = $_POST['nombre1'];
$snombre = $_POST['nombre2'];
$papellido = $_POST['apellido1'];
$sapellido = $_POST['apellido2'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['mail'];
$estado = $_POST['estado'];
	if($estado == "activo"){
		$estado = 1;
	}else{
		$estado = 0;
	}

		

		$sql="INSERT INTO meseros (codigo,nombre,nombre2,apellido,apellido2,telefono,direccion,mail,estado) VALUES ('$codigo','$pnombre','$snombre','$papellido','$sapellido','$telefono','$direccion','$correo','$estado')";
		$res=mysql_query($sql);
			if ($res != "true"){
				
				echo"<script language='JavaScript'> 
              	alert('Ups tuvimos Problemas al guardar los datos'); 
               	location.href='../insertamesero.php';
               	</script>";
			}else{
				
				echo"<script language='JavaScript'> 
                alert('Datos guardados Correctamente'); 
                location.href='../insertamesero.php';
                </script>";
			}