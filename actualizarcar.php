<?php
session_start();

extract($_GET);

$carro=$_SESSION['carro'];
$qry=mysql_query("select * from productos where codigo='".$id."'");
$row=mysql_fetch_array($qry);

$getc = $carro[md5($id)]['cantidad'];
$nc = $getc + 1;
$carro[md5($id)]=array('identificador'=>$carro[md5($id)]['id'],'codigo'=>$carro[md5($id)]['codigo'],'cantidad'=>$nc,'nombre'=>$carro[md5($id)]['nombre'],'precio'=>$carro[md5($id)]['precio'],'id'=>$id);

$_SESSION['carro']=$carro;

header("Location:../factura.php?".SID);
?>