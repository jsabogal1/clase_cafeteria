<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.js"></script>
	<title>Login</title>
	
</head>
<div class="container">
        <div class="row">
			<div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" align="center">
                    <h2>Taller de base de datos</h2>
                    <p>Base de Datos donde podras buscar, insertar, modificar y eliminar registros</p>
                      <legend><img align="center" class="img-rounded"src="img/mysql.jpg" class="img-responsive"></legend>
                      <h1 class="panel-title" align="center">Por Favor Inicie Sesion</h1>
                    </div>
                    <div class="panel-body">
                        <form role="form"class="form-horizontal" method="POST" action="config/validar.php">
  						<fieldset>
   					    <div class="form-group">
      					<div class="col-lg-10">
					        <input class="form-control" autofocus required="true" name="nombre" placeholder="Nombre de Usuario" type="text">
					    </div>
					    <br/>
					    <div class="col-lg-10">
					        <input class="form-control" required="true" name="contrasena" placeholder="Contraseña" type="password">
					    </div>
					    </div>
						<button class="btn btn-default" type="submit">Ingresar</button>
						</fieldset>
						</form>
						<p><a href="contacto.php">Contactenos!!</a></p>
			</div>
			</div>
	</div>			
</div>
</div>
</body>
</html>


