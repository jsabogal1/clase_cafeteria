<?php session_start();
$name = $_SESSION['nombre'];
?>
<?php if ($name == "") {
	header("location: index.php");
}?>
 <?php if ($_SESSION['rol'] == "Administrador") { ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Restaurante</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="dropdown">      
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="insertarcliente.php">Nuevo</a></li>
            <li><a href="listacli.php">Ver</a></li>            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart"></span> Factura <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="factura.php">Ver</a></li>
            
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-zoom-in"></span> Productos <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="insertarpro.php">Nuevo</a></li>
          <li><a href="modificapro.php?id=1">Editar</a></li>
          <li><a href="Listapro.php">Ver</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Meseros <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="insertamesero.php">Nuevo</a></li>
            <li><a href="listamesero.php">Ver</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-sunglasses"></span> Usuario <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="insertarusuario.php">Nuevo</a></li>
            <li><a href="Listaru.php">Ver</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-blackboard">Noticias <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="noticiadd.php">Nueva</a></li>
            <li><a href="listanoti.php">Ver</a></li>
          </ul>
        </li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-save">Descargas<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="copiaseguridad.php">Copia Seguridad</a></li>
          <li><a href="librodia.php">Libro diario</a></li>
            
          </ul>
        </li>
      </ul>
      

      <ul class="nav navbar-nav navbar-right">
        <li><a href="config/logout.php">Salir</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['nombre'];?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="modifica.php">Actualizar Datos</a></li>
            
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Bienvenido</a></li>
      </ul>
       
    </div>
  </div>
</nav>
 <?php }else{ ?>
	
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Restaurante</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="insertarcliente.php">Nuevo</a></li>
            <li><a href="listacli.php">Ver</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart"></span>Factura <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="factura.php">Ver</a></li>
            </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-zoom-in">Productos <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="Listapro.php">Ver</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-blackboard">Noticias <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="noticiadd.php">Nueva</a></li>
            <li><a href="listanoti.php">Ver</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-save">Descargas<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="copiaseguridad.php">Copia Seguridad</a></li>
          <li><a href="librodia.php">Libro diario</a></li>
          </ul>
      
      </ul>

      

      <ul class="nav navbar-nav navbar-right">
        <li><a href="config/logout.php">Salir</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $name;?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="modifica.php">Actualizar Datos</a></li>
            
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Bienvenido</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php } ?>