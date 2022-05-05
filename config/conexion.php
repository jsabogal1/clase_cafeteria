<?php

$host = "localhost";
$user = "root";
$pw = "";
$db = "restaurante";

$con=mysql_connect($host,$user,$pw)or die("Problemas al Conectar con el Server");
mysql_select_db($db,$con)or die("Problemas al Conectar con la BD");
mysql_set_charset('utf8');

?>