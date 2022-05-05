<?php session_start()?>
<html>
<head>

<meta charset="UTF-8">
<title><h1>Base de Datos en Mysql con php</h1></title>




</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input class="form-control" placeholder="Search" type="text">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div>
  </div>
</nav>
	<p align="center"><font face="verdana" size="10" color="Green"><strong>TALLER DE BASE DE DATOS</strong></font></p> 
	<br>
	<p align = "right">.: Bienvenido :.</a><br></p>
	<p align = "right"><?php echo $_SESSION['nombre'];?></a><br></p>
	<p align = "right"><a href="logout.php">| Salir |</a><br></p>

	<div align="center"><font face="ARIAL" size="5">
		<img src="mysql.jpg" alt="Base de datos mysql"><br>
	Base de Datos donde podras buscar, insertar, modificar y eliminar registros
	<br><br>
	<a href="factura.php">| facturar |</a>
	<a href="buscar.php">| Buscar |</a>
	<a href="insertarcliente.php"> | Insertar |</a>
	<a href="modificar_b.php">| Actualizar |</a>
	<a href="eliminar.php">| Eliminar |</a>
	<a href="restaurar.php">| Restaurar cliente |</a>
	<a href="listar_registro.php">| Listar |</a><br>
	</font>
	</div>
	

</body>
</html>