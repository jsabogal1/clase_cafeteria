<?php
include("config/conexion.php");
session_start();	
require('pdf/fpdf.php');
date_default_timezone_set("America/Bogota");
$fecha = date("Y-m-d");


class PDF extends FPDF{		
		//encabezado del documento
		function header(){	
		global $fecha;
		global $total;
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
			$this->MultiCell(90, 17, utf8_decode('Libro de Ventas del dia:'), 0,'L');
			$this->SetXY(132,10);
			$this->MultiCell(55, 20, utf8_decode(date("Y-m-d")), 0,'L');
			$this->ln(5);			
		}
		//pie del docuento
		function Footer(){
			$this->SetY(-15);
			$this->SetFont('Arial', 'I',10);
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
		
		function tablaDetalleVenta($titulos,$detafactura){
		$this->SetFillColor(0,0,255);
	    $this->SetTextColor(255);
	    $this->SetDrawColor(0,0,128);
	    $this->SetLineWidth(.3);
	    $this->SetFont('','B');	    
	    // Cabecera
	    $w = array(10, 20,25, 20, 85,40);
	    for($i=0;$i<count($titulos);$i++)
	        $this->Cell($w[$i],7,$titulos[$i],1,0,'C',true);
	    $this->Ln();
	    // Restauración de colores y fuentes
	    $this->SetFillColor(224,235,255);
	    $this->SetTextColor(0);
	    $this->SetFont('');
	    // Datos
	    $item = 0;
	    $total = 0;
	    	    
	  while($fdetalle=mysql_fetch_array($detafactura))
   	 {
   	 	$item = $item+1;
        $this->Cell($w[0],6,$item,'LR','0','C');
        $this->Cell($w[1],6,$fdetalle['codigo'],'LR','0','C');
        $this->Cell($w[2],6,$fdetalle['forma_pago'],'LR','0','C');
        $this->Cell($w[3],6,$fdetalle['id_cliente'],'LR','0','C');
        $idcliente = $fdetalle['id_cliente'];
        $detcli = mysql_query("SELECT nombre,nombre2,apellido,apellido2 FROM clientes where codigo = '$idcliente'") or die("Problema en la Consulta".mysql_error());
		$detclie = mysql_fetch_array($detcli);
       	$this->Cell($w[4],6,$detclie['nombre'].' '.$detclie['nombre2'].' '.$detclie['apellido'].' '.$detclie['apellido2'],'LR','0','L');
        $this->Cell($w[5],6,number_format($fdetalle['costo']),'LR','0','R');
        $total = $total+$fdetalle['costo'];
	    $this->Ln();
	        
	    }
	    // Línea de cierre
	    $this->Cell(array_sum($w),0,'','T');
	    $this->ln();
	    $this->Cell(129,6,"",'LR',0,'L');
	    $this->Cell(31,6,"TOTAL",'LR',0,'L');
	    $this->Cell(40,6,number_format($total),'LR',0,'R');
	    $this->ln();
	    $this->Cell(0,0,'','T');
		}	
		
	}	
	$codigo = $_SESSION['cfac'];
	$datafactura = mysql_query("SELECT * FROM factura where codigo = '$codigo'") or die("Problema en la Consulta".mysql_error());
	$datos=mysql_fetch_array($datafactura);
	$idcliente = $datos['id_cliente'];
	$datacli = mysql_query("SELECT * FROM clientes where codigo = '$idcliente'") or die("Problema en la Consulta".mysql_error());
	$datacliente = mysql_fetch_array($datacli);
	$detafactura = mysql_query("SELECT * FROM factura where fecha like '$fecha%'") or die("Problema en la Consulta".mysql_error());
	
	$fecha = $datos['fecha'];

	$titulos = array('Item','factura','Forma Pago','Codigo','Cliente','Precio');
	$pdf=new PDF();
	$pdf->SetMargins(5, 10 , 5); 
	
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->header($datos);
	
	$pdf->tablaDetalleVenta($titulos,$detafactura);
	
	$pdf->SetFont('Times','',25);
	
	$pdf->Output();
?>
