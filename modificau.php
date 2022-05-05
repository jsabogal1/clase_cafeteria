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
$usuarios = mysql_query("SELECT * FROM usuarios order by codigo") or die("Problema en la Consulta".mysql_error());
$data = mysql_query("SELECT * FROM usuarios where codigo = '".$code."'") or die("Problema en la Consulta".mysql_error());
$datos=mysql_fetch_array($data) // creamos un array con con los datos obtenidos de todos los usuarios en la db
?>
<div class="container">
        <div class="row">
        <form method="post" action="config/modusuario.php" class="col-lg-4">
            <h3>Editar Usuario <?php echo $datos['nombre'];?></h3>
            <hr/>
            Documento:<input type="text" readonly="true" name="documento" class="form-control" value="<?php echo $datos['codigo'];?>" />
            Nombre Usuario:<input type="text" name="nombre" required="true" autofocus="true" value="<?php echo $datos['nombre'];?>"  class="form-control" />
            Correo:<input type="text" name="mail" value="<?php echo $datos['mail'];?>"  class="form-control" />
            Rol:<select name="rol" class="form-control">
                <option><?php echo $datos['rol'] ?></option>
                <?php if( $datos['rol'] == "Administrador"){
                    echo "<option>Empleado</option>";}else
                    {echo "<option>Administrador</option>";
                        }?>
                
                </select>
                Estado:<select name="estado" class="form-control">
                <?php if( $datos['estado'] == 1){ echo "<option>Activo</option>" ;}else{echo "<option>Inactivo</option>";}?>
                <?php if( $datos['estado'] == 1){
                    echo "<option>Inactivo</option>" ; }else
                    {echo "<option>Activo</option>";
                        }?>
                
                </select>
            <br/>
            <input type="submit" value="Guardar" class="btn btn-primary" id="a"/>
        </form>
        
        <div class="col-lg-8">
            <h3>Usuarios</h3>
            <hr/>
        </div>
        <section class="col-lg-8 dataTable_wrapper"  style="height:450px;overflow-y:scroll;">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
           <tr>
           	<th>Documento</th>
            <th>Nombre Usuario</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Rol</th>
            <th>Accion</th>
           </tr>
           </thead>
           <tbody>
           <tr class="odd gradeX">
           <?php while ($user=mysql_fetch_array($usuarios)) {?>
               <td> <?php echo $user['codigo']; ?></td>
                <td><?php echo  $user['nombre']; ?></td>
                <td><?php echo  $user['mail']; ?></td>
                <td><?php if($user['estado'] == 1){echo "Activo";}else{ echo "Inactivo";}; ?></td>
                <td><?php echo $user['rol']; ?></td>
                
                <td><a class="btn btn-primary"href="modificau.php?id=<?php echo $user['codigo']; ?>">Editar</a></td>

                </tr>
            <?php } ?>
            
            </tr></tbody>
            </table>
            
            
        </section>
		
        </div>
        </div>

</body>
</html>


