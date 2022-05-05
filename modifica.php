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
$code=$_SESSION['cod'];
$data = mysql_query("SELECT * FROM usuarios where codigo = '".$code."'") or die("Problema en la Consulta".mysql_error());
$datos=mysql_fetch_array($data) // creamos un array con con los datos obtenidos de todos los usuarios en la db
?>
<div class="container">
        <div class="row" class="center">
        <form method="post" action="config/actudata.php" class="col-lg-5">
            <h3>Editar Usuario <?php echo $datos['nombre'];?></h3>
            <hr/>
            Documento:<input type="text" readonly="true" name="documento" class="form-control" value="<?php echo $datos['codigo'];?>" />
            Nombre Usuario:<input type="text" name="nombre" required="true" autofocus="true" value="<?php echo $datos['nombre'];?>"  class="form-control" />
            Correo:<input type="text" name="nombre"  value="<?php echo $datos['mail'];?>"  class="form-control" />
               
            <br/>
            <input type="submit" value="Guardar" class="btn btn-primary" id="a"/>
        </form>
       
        <form method="post" action="config/actuapass.php" class="col-lg-5">
            <h3>Cambiar Contraseña</h3>
            <hr/>
           
            Contraseña Actual:<input type="password" name="contraac" required="true" autofocus="true" class="form-control" />
            Contraseña Nueva:<input type="password" name="contran1" required="true" autofocus="true" class="form-control" />
            Repita Contraseña Nueva:<input type="password" name="contran2" required="true" autofocus="true" class="form-control" />
               
            <br/>
            <input type="submit" value="Guardar" class="btn btn-primary" id="a"/>
        </form>
       
		
        </div>
        </div>

</body>
</html>


