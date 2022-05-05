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
	<title>Contacto</title>
</head>
<div class="container">
        <div class="row">
			<div class="col-md-4 col-md-offset-4">                
                    <div class="panel-heading" align="center">
                    <h2>Formulario de contacto</h2>
                    </div>
                    <div class="panel-body">
                        <form role="form"class="form-horizontal" method="POST" action="config/contacto.php">
   					    <div class="form-group">
      					<div class="col-lg-10">
      						Nombres<input type="text" name="nombres" autofocus="" required="true" class="form-control"/>
      						Apellidos<input type="text" name="apellidos" required="true" class="form-control"/>
      						Correo<input type="email" name="correo" required="true" class="form-control"/>
      						Telefono<input type="text" name="telefono" required="true" onkeypress="return valida(event)" class="form-control"/>
      						Direccion<input type="text" name="direccion" required="true" class="form-control"/>
      						Mensaje<textarea type="text" name="mensaje" required="true" class="form-control"/> </textarea> 
					    </div>
					    <br/>					    
					    </div>
						<button class="btn btn-default" type="submit">Enviar</button>
						</fieldset>
						</form>
					</div>
			</div>
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


