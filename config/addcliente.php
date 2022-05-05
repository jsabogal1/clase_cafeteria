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

		

		$sql="INSERT INTO clientes (codigo,nombre,nombre2,apellido,apellido2,direccion,telefono,mail) VALUES ('$codigo','$pnombre','$snombre','$papellido','$sapellido','$direccion','$telefono','$correo')";
		$res=mysql_query($sql);
			if ($res != "true"){
				
				echo"<script language='JavaScript'> 
              	alert('Ups tuvimos Problemas al guardar los datos'); 
               	location.href='../insertarcliente.php';
               	</script>";
			}else{
				
				echo"<script language='JavaScript'> 
                alert('Datos guardados Correctamente'); 
                location.href='../insertarcliente.php';
                </script>";
			}