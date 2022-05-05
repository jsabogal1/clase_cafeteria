<?php

include("conexion.php");

$codigo = $_POST['codigo'];
$titulo = $_POST['nombre1'];
$contenido = $_POST['contenido'];
$fecha= date("Y"."-"."m"."-"."d"."-"."H".":"."i".":"."s");


		

		$sql="INSERT INTO noticias (titulo,usuario,contenido,fecha) VALUES ('$titulo','$codigo','$contenido','$fecha')";
		$res=mysql_query($sql);
			if ($res != "true"){
				
				echo"<script language='JavaScript'> 
              	alert('Ups tuvimos Problemas al guardar los datos'); 
               	location.href='../noticiadd.php';
               	</script>";
			}else{
				
				echo"<script language='JavaScript'> 
                alert('Datos guardados Correctamente'); 
                location.href='../noticiadd.php';
                </script>";
			}