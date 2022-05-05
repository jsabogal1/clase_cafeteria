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
$code = $_GET['id']; //Obetenes el codigo mediante url para hacer la consulta a la db
$clientes = mysql_query("SELECT * FROM productos order by codigo") or die("Problema en la Consulta".mysql_error());
$data = mysql_query("SELECT * FROM productos where codigo = '$code'") or die("Problema en la Consulta".mysql_error());
$datos=mysql_fetch_array($data) // creamos un array con con los datos obtenidos de todos los usuarios en la db
 ?>
<div class="container">
        <div class="row">
        <form method="post" action="config/modpro.php" class="col-lg-4">
            <h3>Editar Producto</h3>
            <hr/>
            Imagen:<br>
            <img height="140px" width="140px" src="<?php echo $datos['imagen_url']; ?>"><br>
            Codigo:<input type="text" readonly="true" name="documento" value="<?php echo $datos['codigo'];?>"class="form-control"/>
            Nombre:<input type="text" name="nombre1" required="true" autofocus="true" value="<?php echo $datos['nombre'];?>" class="form-control"/>
			Precio:<input type="text" name="precio" required="true" autofocus="true" value="<?php echo $datos['precio'];?>" class="form-control"/><br>
            
            <input type="submit" value="Guardar" class="btn btn-primary" id="a"/>
        </form>
        
        <div class="col-lg-8">
            <h3>Meseros</h3>
            <hr/>
        </div>
        <section class="col-lg-8 dataTable_wrapper"  style="height:450px;overflow-y:scroll;">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
           <tr>
		   <th>Imagen</th>
           	<th>Documento</th>
            <th>P. Nombre</th>
			<th>Precio</th>
           </tr>
           </thead>
           <tbody>
           <tr class="odd gradeX">
           <?php while ($user=mysql_fetch_array($clientes)) {?>
		   <td><img height="140px" width="140px" class="img-circle" src="<?php echo $user['imagen_url']; ?>"></td>
               <td> <?php echo $user['codigo']; ?></td>
                <td><?php echo  $user['nombre']; ?></td>
                <td><?php echo  $user['precio']; ?></td>
             
                 <td><a class="btn btn-primary"href="modificapro.php?id=<?php echo $user['codigo']; ?>">Editar</a></td>
                </tr>
            <?php } ?>
            
            </tr></tbody>
            </table>
            
            
        </section>
		
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
	
</body>
</html>


