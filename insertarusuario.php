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
$usuarios = mysql_query("SELECT * FROM usuarios order by codigo") or die("Problema en la Consulta".mysql_error());
?>
<div class="container">
        <div class="row">
        <form method="post" action="config/addusuario.php" class="col-lg-4">
            <h3>Añadir Usuario</h3>
            <hr/>
            Documento:<input type="text" required="true" name="documento" autofocus="" onkeypress="return valida(event)" class="form-control"/>
            Nombre Usuario:<input type="text" name="nombre1" required="true"  class="form-control"/>
            Correo:<input type="text" name="mail" class="form-control"/>
            Contraseña:<input type="password" name="contrasena1" required="true" class="form-control"/>
            Repetir Contraseña:<input type="password" name="contrasena2" required="true" class="form-control"/>
            Estado:<select name="estado" class="form-control">
                <option>Activo</option>
                <option>Inactivo</option>
                </select>
            Rol:<select name="rol" class="form-control">
                <option>Seleccione</option>
                <option>Administrador</option>
                <option>Empleado</option>
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
            <th>modificar</th>
           </tr>
           </thead>
           <tbody>
           <tr class="odd gradeX">
           <?php while ($user=mysql_fetch_array($usuarios)) {?>
               <td> <?php echo $user['codigo']; ?></td>
                <td><?php echo  $user['nombre']; ?></td>
                <td><?php echo  $user['mail']; ?></td>
                <td><?php if($user['estado'] = 1){echo "Activo";}else{ echo "Inactivo";}; ?></td>
                <td><?php echo $user['rol']; ?></td>
                <td><a class="btn btn-primary" href="modificau.php?id=<?php echo $user['codigo']; ?>">Editar</a></td>
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


