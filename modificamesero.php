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
$clientes = mysql_query("SELECT * FROM meseros order by codigo") or die("Problema en la Consulta".mysql_error());
$data = mysql_query("SELECT * FROM meseros where codigo = '$code'") or die("Problema en la Consulta".mysql_error());
$datos=mysql_fetch_array($data) // creamos un array con con los datos obtenidos de todos los usuarios en la db
 ?>
<div class="container">
        <div class="row">
        <form method="post" action="config/modmesero.php" class="col-lg-4">
            <h3>Editar Mesero</h3>
            <hr/>
            Documento:<input type="text" readonly="true" name="documento" value="<?php echo $datos['codigo'];?>"class="form-control"/>
            Primer Nombre:<input type="text" name="nombre1" required="true" autofocus="true" value="<?php echo $datos['nombre'];?>" class="form-control"/>
            Segundo Nombre:<input type="text" name="nombre2"value="<?php echo $datos['nombre2'];?>" class="form-control"/>
            Primer Apellido:<input type="text" name="apellido1" required="true"value="<?php echo $datos['apellido'];?>" class="form-control"/>
            Segundo Apellido:<input type="text" name="apellido2" value="<?php echo $datos['apellido2'];?>" class="form-control"/>
            Direccion: <input type="text" name="direccion" value="<?php echo $datos['direccion'];?>" class="form-control"/>
            Correo: <input type="text" name="mail" value="<?php echo $datos['mail'];?>" class="form-control"/>
			 Estado:<select name="estado" class="form-control">
                <?php if( $datos['estado'] == 1){ echo "<option>Activo</option>" ;}else{echo "<option>Inactivo</option>";}?>
                <?php if( $datos['estado'] == 1){
                    echo "<option>Inactivo</option>" ; }else
                    {echo "<option>Activo</option>";
                        }?>
                
                </select>
            Telefono: <input type="text" name="telefono" value="<?php echo $datos['telefono'];?>"  onkeypress="return valida(event)" class="form-control"/>
            <br/>
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
           	<th>Documento</th>
            <th>P. Nombre</th>
            <th>S. Nombre</th>
            <th>P. Apellido</th>
            <th>S. Apellido</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
			<th>Estado</th>
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
                <td><?php echo $user['mail']; ?></td>
                <td><?php echo $user['telefono']; ?></td>
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


