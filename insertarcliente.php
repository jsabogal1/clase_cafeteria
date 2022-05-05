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
$clientes = mysql_query("SELECT * FROM clientes order by codigo") or die("Problema en la Consulta".mysql_error());
?>
<div class="container">
        <div class="row">
        <form method="post" action="config/addcliente.php" class="col-lg-4">
            <h3>Añadir Cliente</h3>
            <hr/>
            Documento:<input type="text" required="true" name="documento" autofocus="" onkeypress="return valida(event)"class="form-control"/>
            Primer Nombre:<input type="text" name="nombre1" required="true"  class="form-control"/>
            Segundo Nombre:<input type="text" name="nombre2" class="form-control"/>
            Primer Apellido:<input type="text" name="apellido1" required="true" class="form-control"/>
            Segundo Apellido:<input type="text" name="apellido2" class="form-control"/>
            Direccion: <input type="text" name="direccion"  class="form-control"/>
            Correo:<input type="text" name="mail" class="form-control"/>
            Telefono: <input type="text" name="telefono" onkeypress="return valida(event)" class="form-control"/>
            <br/>
            <input type="submit" value="Guardar" class="btn btn-primary" id="a"/>
        </form>
        
        <div class="col-lg-8">
            <h3>Clientes</h3>
            <hr/>
        </div>
        <section class="col-lg-8 dataTable_wrapper"  style="height:450px;overflow-y:scroll;">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
           <tr>
           	<th>Documento</th>
            <th>P. Nombre</th>
            <th>S. Nombre</th>
            <th>P. Apellido</th>
            <th>S. Apellido</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Accion</th>
           </tr>
           </thead>
           <tbody>
           <tr class="odd gradeX">
           <?php while ($user=mysql_fetch_array($clientes)) {?>
               <td> <?php echo $user['codigo']; ?></td>
                <td><?php echo  $user['nombre']; ?></td>
                <td><?php echo  $user['nombre2']; ?></td>
                <td><?php echo $user['apellido']; ?></td>
                <td><?php echo $user['apellido2']; ?></td>
                <td><?php echo $user['direccion']; ?></td>
                <td><?php echo $user['telefono']; ?></td>
                <td><?php echo $user['mail']; ?></td>
                 <td><a class="btn btn-primary"href="modificacli.php?id=<?php echo $user['codigo']; ?>">Editar</a></td>
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


