<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<title>Realizar Factura</title>
</head>
<body>
	<?php include("menu.php");
	$carro=$_SESSION['carro']; 
	?>
	<div class="container">
        <div class="row">
        	 <?php if($carro){ ?> 
	        <div class="col-lg-12">
	            <h3>Carro de Compra</h3>
	            <hr/>
	        </div>
	        
        <section class="col-lg-12">
        	<div style="height:350px;overflow-y:scroll";>
        	<table class="table table-striped table-bordered table-hover" id="dataTables-example" >
        		 
	       	 	<thead>
			        <tr>
			        	<th>Producto</th>
			        	<th>Precio</th>
			        	<th>Cantidad</th>
			        	<th>Borrar</th>
			        	
		    	    </tr>
	        	</thead>
		       	<tbody>
		        	<tr class="odd gradeX">
		        	<?php
		        		 $contador=0; 
						 $suma=0; 
						 foreach($carro as $k => $v){ 
						 $subto=$v['cantidad']*$v['precio']; 
						 $suma=$suma+$subto; 
						 $contador++; 
					?>
		        		<td><?php echo $v['nombre']; ?></td>
		        		<td><?php echo number_format($v['precio'],2); ?></td>
		        		<td><?php echo $v['cantidad'] ?></td>
		        		<td><a class="btn btn-danger" href="config/borracar.php?<?php echo SID ?>&id=<?php echo $v['id'] ?>">Borrar <a class="btn btn-primary" href="config/actualizarcar.php?<?php echo SID ?>&id=<?php echo $v['id'] ?>">Agregar</td>
		        		
		        	</tr>
		        	<?php }?> 
		        </tbody>
			</table>
			</div>
			<!--<div align="center"><span class="prod">Total de Artículos: <?php //echo count($carro); ?></span> </div> -->
			<div align="center"><span class="prod"><h3>Total: $<?php echo number_format($suma,2); ?></h3></span></div> 
			<br> 
			<div align="center">
			 <a class="btn btn-primary" href="listapro.php?<?php echo SID;?>">Agregar (+) Productos</a>&nbsp; 
			 <a class="btn btn-primary" href="regpago.php?<?php echo SID;?>&costo=<?php echo $suma; ?>">Realizar Pago</a> 

			</div> 
 
			<?php }else{ ?> 
				<p align="center"> <span class="prod">No hay productos seleccionados</span><br> <a class="btn btn-primary" href="listapro.php?<?php echo SID;?>">Agregar Producto</a> <?php }?></p>  
		</section>
		
		</div>
	</div>
	
</body>
</html>