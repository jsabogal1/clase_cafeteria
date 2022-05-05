<?php
include("conexion.php");

$codigo = $_POST['documento'];
$nombre = $_POST['nombre1'];
$precio = $_POST['precio'];
 
 $sql=mysql_query("UPDATE productos set nombre='$nombre', precio='$precio' WHERE codigo='$codigo'");
header("location: ../listapro.php");
 /*
if ($_FILES["imagen"]["error"] > 0){
	echo "ha ocurrido un error";
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 15000;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "../img/" . $_FILES['imagen']['name'];
		//comprovamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){
				include("conexion.php");
				$producto=$_POST['nombre1'];
				$precio = $_POST['precio'];
				$r = "img/".$_FILES['imagen']['name'];
				$sql="INSERT INTO productos (nombre,precio,imagen_url) VALUES ('$producto','$precio','$r')";
				$res=mysql_query($sql);
				if ($res != "true"){
					echo"<script language='JavaScript'> 
	              	alert('Ocurrio un error mientras se intentaban guardar los datos'); 
	               	location.href='../insertarpro.php';
	               	</script>";
				}else{
					echo"<script language='JavaScript'> 
	              	alert('Producto guardado Correctamente'); 
	               	location.href='../insertarpro.php';
	               	</script>";
					}
			} else {
				echo"<script language='JavaScript'> 
              	alert('Ups tuvimos Problemas al subir la imagen'); 
               	location.href='../insertarpro.php';
               	</script>";
				}
		} else {
			echo"<script language='JavaScript'> 
              	alert('El nombre de la Imgagen ya existe en el servidor'); 
               	location.href='../insertarpro.php';
               	</script>";
			}
		} else {
			echo"<script language='JavaScript'> 
              	alert('Formato de archivo no permitido o excede el tamaño permitido'); 
               	location.href='../insertarpro.php';
               	</script>";
			
		}
}*/
?>

