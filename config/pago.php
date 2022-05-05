<?php
session_start(); 
$documento = $_POST['documento'];
$pago = $_POST['fpago'];
$mesero = $_POST['idmesero'];
$precio = $_POST['total'];



$carro=$_SESSION['carro']; 
include("conexion.php");

$sql="INSERT INTO factura (id_cliente,id_mesero,forma_pago,costo) VALUES ('$documento','$mesero','$pago','$precio')";
		$res=mysql_query($sql);
$code= mysql_insert_id();
//Guardamos los datos para hacer el pdf
$_SESSION['cfac']=$code;
 	
 	foreach($carro as $k => $v)
	 {
	 	$codigo = $v['codigo'];
	 	$cantidad = $v['cantidad'];
	 	$sql=("INSERT INTO detallefactura (id_factura,cantidad,id_producto)VALUES('$code','$cantidad','$codigo')");
	$res=mysql_query($sql);
	unset($carro[md5($codigo)]);
	$_SESSION['carro']=$carro;
	 }

	echo "<script type=\"text/javascript\">window.open('http://localhost:8580/cafeteria/facturapdf.php', '_blank');</script>";
	echo "<script type=\"text/javascript\">location.href='../listapro.php';</script>";
?>
 
