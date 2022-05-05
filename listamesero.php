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
$usuarios = mysql_query("SELECT * FROM meseros order by codigo") or die("Problema en la Consulta".mysql_error());
?>
<div class="container">
        <div class="row">
        
        <div class="col-lg-12">
            <h3>Meseros</h3>
            <hr/>
        </div>
        <section class="col-lg-12">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
           <tr>
           	<th>Documento</th>
            <th>P. Nombre</th>
            <th>S. Nombre</th>
            <th>P. Apellido</th>
            <th>S. Apellido</th>            
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo</th>
			<th>Estado</th>
            <th>Accion</th>
           </tr>
           </thead>
           <tbody>
           <tr class="odd gradeX">
           <?php while ($user=mysql_fetch_array($usuarios)) {?>
               <td> <?php echo $user['codigo']; ?></td>
                <td><?php echo  $user['nombre']; ?></td>
                <td><?php echo  $user['nombre2']; ?></td>
                <td><?php echo  $user['apellido']; ?></td>
                <td><?php echo  $user['apellido2']; ?></td>
                <td><?php echo  $user['direccion']; ?></td>
                <td><?php echo  $user['telefono']; ?></td>
                <td><?php echo  $user['mail']; ?></td>
                <td><?php if($user['estado'] == 1){echo "Activo";}else{ echo "Inactivo";}; ?></td>
                <td><a class="btn btn-primary"href="modificamesero.php?id=<?php echo $user['codigo']; ?>">Editar</a></td>
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


