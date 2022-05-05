<?php 
include("conexion.php");
session_start();
extract($_REQUEST);
if(!isset($cantidad)){$cantidad=1;
}

$qry=mysql_query("select * from productos where codigo='".$id."'");
$row=mysql_fetch_array($qry);
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];


		$carro[md5($id)]=array('identificador'=>md5($id),'codigo'=>$id,'cantidad'=>$cantidad,'nombre'=>$row['nombre'],'precio'=>$row['precio'],'id'=>$id);


$_SESSION['carro']=$carro;
header("Location:../factura.php?".SID);
?>