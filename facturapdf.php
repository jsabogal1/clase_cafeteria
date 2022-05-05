<?php
include("config/conexion.php");
session_start();	
require('pdf/fpdf.php');



class PDF extends FPDF{		
		//encabezado del documento
		function header(){	
		global $fecha;
		global $codigo;		
			$this->SetFillColor(0, 0, 0);
			$this->Rect(5, 5, 200, 25, 'F');
			$this->SetFillColor(255, 255, 255);
			$this->Rect(6, 6, 198, 23, 'F');
			$this->SetFillColor(0, 0, 0);
			$this->Rect(5, 5, 40, 25, 'F');
			$this->SetFillColor(255, 255, 255);
			$this->Rect(6, 6, 38, 23, 'F');			
			$this->Image('img/mysql.png',10,10,30,'PNG');
			$this->SetFont('Arial','B',12);
			$this->Cell(60);
			//$this->MultiCell(100, 0, utf8_decode('RESTAURANTE'),0,'C');
			$this->SetXY(40,12);
			$this->MultiCell(100, 10, utf8_decode('RESTAURANTE'), 0,'C');
			$this->SetXY(40,17);
			$this->SetFont('Arial','B',10);
			$this->MultiCell(100, 10, utf8_decode('Nit: 000000000'), 0,'C');
			$this->SetXY(40,20);
			$this->MultiCell(100, 13, utf8_decode('Regimen Simplificado'), 0,'C');
			$this->Cell(20);
			$this->SetFillColor(0, 0, 0);
			$this->Rect(130, 5, 70, 25, 'F');
			$this->SetFillColor(255, 255, 255);
			$this->Rect(131, 6, 72, 23, 'F');
			$this->SetFont('Arial','B',12);
			$this->SetXY(132,6);
			$this->MultiCell(90, 7, utf8_decode('Factura de Venta'), 0,'L');
			$this->SetXY(132,10);
			$this->MultiCell(55, 10, utf8_decode('N°: '.$codigo), 0,'L');
			$this->SetXY(132,15);
			$this->MultiCell(90, 10, utf8_decode('Fecha:         Hora:'), 0,'L');
			$this->SetXY(132,20);
			$this->MultiCell(55, 10,$fecha, 0,'L');
			$this->ln(5);			
		}
		//pie del docuento
		function Footer(){
			$this->SetY(-15);
			$this->SetFont('Arial', 'I',10);
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
		function body($datacliente){		
			$this->SetFillColor(195, 195, 195);
			$this->Rect(5, 32, 200, 6, 'F');
			$this->MultiCell(190, 0, utf8_decode('Datos del Cliente'), 0,'C');
			$this->SetFont('Times','B',12);
			$this->SetXY(5,40);
			$this->Cell(60, 5, utf8_decode('Nombres: '.$datacliente['nombre'].' '.$datacliente['nombre2']), 0,'L');
			$this->SetXY(105,40);
			$this->Cell(90, 5, utf8_decode('Apellidos: '.$datacliente['apellido'].' '.$datacliente['apellido2']), 0,'L');
			$this->SetXY(5,47);
			$this->Cell(90, 5, utf8_decode('Indentificación: '.$datacliente['codigo']), 0,'L');
			$this->SetXY(105,47);
			$this->Cell(90, 5, utf8_decode('Telefono : '.$datacliente['telefono']), 0,'L');
			$this->SetXY(105,52);
			$this->Cell(90, 10, utf8_decode('Mesero: '), 0,'L');
			$this->SetXY(5,52);
			$this->MultiCell(200, 10, utf8_decode('Dirección: '.$datacliente['direccion']), 0,'L');
			$this->SetXY(5,59);
			$this->MultiCell(200, 10, utf8_decode('Correo: '.$datacliente['mail']), 0,'L');
		}
		function tablaDetalleVenta($titulos,$detafactura){
		$this->SetFillColor(0,0,255);
	    $this->SetTextColor(255);
	    $this->SetDrawColor(0,0,128);
	    $this->SetLineWidth(.3);
	    $this->SetFont('','B');

	    // Cabecera
	    $w = array(12, 17, 75, 25,30,41);
	    for($i=0;$i<count($titulos);$i++)
	        $this->Cell($w[$i],7,$titulos[$i],1,0,'C',true);
	    $this->Ln();
	    // Restauración de colores y fuentes
	    $this->SetFillColor(224,235,255);
	    $this->SetTextColor(0);
	    $this->SetFont('');
	    // Datos
	    $item = 0;
	    
	  while($fdetalle=mysql_fetch_array($detafactura))
   	 {
   	 	$item = $item+1;
        $this->Cell($w[0],6,$item,'LR','0','C');
        $this->Cell($w[1],6,$fdetalle['id_producto'],'LR','0','C');
        $idpro = $fdetalle['id_producto'];
        $datapro = mysql_query("SELECT nombre,precio FROM productos where codigo = '$idpro'") or die("Problema en la Consulta".mysql_error());
		$detpro = mysql_fetch_array($datapro);
       	$this->Cell($w[2],6,$detpro['nombre'],'LR');
        $this->Cell($w[3],6,number_format($detpro['precio']),'LR');
        $this->Cell($w[4],6,$fdetalle['cantidad'],'LR','0','C');
        $this->Cell($w[5],6,number_format($detpro['precio']*$fdetalle['cantidad']),'LR','0','R');
	    $this->Ln();
	        
	    }
	    // Línea de cierre
	    $this->Cell(array_sum($w),0,'','T');
	    $this->ln();
		}	
		function tablaDetallePago($datos){
			$this->Cell(129,6,"",'LR',0,'L');
			$this->Cell(30,6,"TOTAL",'LR',0,'L');
			$this->Cell(41,6,number_format($datos['costo']),'LR',0,'R');
			$this->ln();
			$this->Cell(0,0,'','T');
			$this->ln();
			$this->Cell(129,6,"",'LR',0,'L');
			$this->Cell(30,6,"Forma de pago",'LR',0,'L');
			$this->Cell(41,6,$datos['forma_pago'],'LR',0,'R');
			$this->ln();
			$this->Cell(0,0,'','T');
			$this->ln();
			
		}
		
	}	
	//$codigo = $_SESSION['cfac'];
	$codigo = 10;
	$datafactura = mysql_query("SELECT * FROM factura where codigo = '$codigo'") or die("Problema en la Consulta".mysql_error());
	$datos=mysql_fetch_array($datafactura);
	$idcliente = $datos['id_cliente'];
	$datacli = mysql_query("SELECT * FROM clientes where codigo = '$idcliente'") or die("Problema en la Consulta".mysql_error());
	$datacliente = mysql_fetch_array($datacli);
	$detafactura = mysql_query("SELECT * FROM detallefactura where id_factura = '$codigo'") or die("Problema en la Consulta".mysql_error());
	
	$fecha = $datos['fecha'];

	$titulos = array('Item','Codigo','Producto','V/r Unitario','Cantidad','V/r Parcial');
	$pdf=new PDF();
	$pdf->SetMargins(5, 10 , 5); 
	
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->header($datos);
	$pdf->body($datacliente);
	$pdf->tablaDetalleVenta($titulos,$detafactura);
	$pdf->tablaDetallePago($datos);
	$pdf->SetFont('Times','',25);
	
	$pdf->Output();
?>
