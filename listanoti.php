<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.js"></script>
	<title>Insertar Registros</title>
</head>
<body>
<?php include("menu.php"); include("config/conexion.php");
ob_start();
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
$productos = mysql_query("SELECT * FROM noticias order by codigo") or die("Problema en la Consulta".mysql_error());

?>
<div class="container">
        <div class="row">
        
        <div class="col-lg-12">
            <h3>Noticias</h3>
            <hr/>
        </div>
        <?php while ($prod=mysql_fetch_array($productos)) {?>
            <?php $user= $prod['usuario'];
                $nombre = mysql_query("SELECT nombre,rol From usuarios where codigo='$user'") or die ("Problemas en la Consulta".mysql_error());
                $data = mysql_fetch_array($nombre);?>
            <section class="col-lg-12">
            <article>
                <header>
                <h1><?php echo $prod['titulo']; ?></h1>
                </header>
                <p><?php echo $prod['contenido']; ?></p>
                <p>Creado por: <i><?php echo  $data['nombre']; ?> </i>El Dia: <spam><?php echo $prod['fecha'];?></spam></p>
                <hr>
            </article>
            </section>
            <?php }?>

           
		
        </div>
        </div>
	<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
<?php 
ob_end_flush();
?>
</body>
</html>


