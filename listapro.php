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
ob_start();
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
$productos = mysql_query("SELECT * FROM productos order by codigo") or die("Problema en la Consulta".mysql_error());
?>
<div class="container">
        <div class="row">
        
        <div class="col-lg-12">
            <h3>Productos</h3>
            <hr/>
        </div>
        <section class="col-lg-12">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
           <tr>
           <th>Imagen</th>  
           	<th>Nombre</th>
            <th>Precio</th>
            <th>Accion &nbsp;<a href="factura.php?<?php echo SID ?>"><span class="glyphicon glyphicon-shopping-cart"></span>Ver Carrito</th>
            
           </tr>
           </thead>
           <tbody>
           <tr class="odd gradeX">
           <?php while ($prod=mysql_fetch_array($productos)) {?>
                <td> <img height="140px" width="140px" class="img-circle" src="<?php echo $prod['imagen_url']; ?>"></td>
                <td> <?php echo $prod['nombre']; ?></td>
                <td><?php echo  number_format($prod['precio'],2); ?></td>
                <td><?php
    if(!$carro || !isset($carro[md5($prod['codigo'])]['identificador'])){
    //si el producto no ha sido agregado, mostramos la imagen de no agregado, linkeada
    // a nuestra página de agregar producto y transmitíéndole a dicha
    //página el id del artículo y el identificador de la sesión
    ?><a class="btn btn-primary" href="config/addcarro.php?<?php echo SID ?>&id=<?php echo $prod['codigo']; ?>">Agregar</a><?php }
    else
    //en caso contrario mostramos la otra imagen linkeada., a la página que sirve para borrar el artículo del carro.
    {?><a class="btn btn-danger" href="config/borracar.php?<?php echo SID ?>&id=<?php echo $prod['codigo']; ?>">Quitar</a>&nbsp;<a class="btn btn-primary" href="config/actualizarcar.php?<?php echo SID ?>&id=<?php echo $prod['codigo']; ?>">Agregar</a><?php }  ?>
   
    </td>
  </tr><?php } ?>

                
                </tr>
            
            
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
<?php 
ob_end_flush();
?>
</body>
</html>


