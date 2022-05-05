<?php
	require('pdf/fpdf.php');
	// Documento Basico//
	/*$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',20); // tipo de fuente y tamaño
	$pdf->Cell(0,20,'Hola mundo!!!',1); //imprime con rectangulo
	//$pdf->Cell(30,60,'Hola mundo!!!',5);
	$pdf->Ln();//salto de linea
	//$pdf->Cell(80,80,'Hola mundo!!!',0,1,'C'); // centrado
	$pdf->Output();
	*/
	//Documento con encabezado y pie de pagina
	/*
	class PDF extends FPDF{
		
		//encabezado del documento
		function header(){
			$this->Image('img/iconser.png',10,8,33);
			$this->SetFont('Arial','B',15);
			$this->Cell(80);
			$this->Cell(60,15,'Titulo del docuemtno',1,10,'C');
			$this->Ln(20);
		}
		//pie del docuento
		function Footer(){
			$this->SetY(-15);
			$this->SetFont('Arial', 'I',6);
			$this->Cell(0,10,'page '.$this->PageNo().'/{nb}',0,0,'C');
		}
		
	}
	
	$pdf=new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',25);
	for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Imprimiendo linea numero '.$i,0,1);
	$pdf->Output();
	*/
	
	//Cuadros de colores y saltos de linea desde un archivo de texto
	/*class PDF extends FPDF
{
function Header()
{
    global $title;

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Calculamos ancho y posición del título.
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    // Colores de los bordes, fondo y texto
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(220,50,50);
    // Ancho del borde (1 mm)
    $this->SetLineWidth(1);
    // Título
    $this->Cell($w,9,$title,1,1,'C',true);
    // Salto de línea
    $this->Ln(10);
}

function Footer()
{
    // Posición a 1,5 cm del final
    $this->SetY(-15);
    // Arial itálica 8
    $this->SetFont('Arial','I',8);
    // Color del texto en gris
    $this->SetTextColor(128);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num, $label)
{
    // Arial 12
    $this->SetFont('Arial','',12);
    // Color de fondo
    $this->SetFillColor(200,220,255);
    // Título
    $this->Cell(0,6,"Capitulo $num : $label",0,1,'L',true);
    // Salto de línea
    $this->Ln(4);
}

function ChapterBody($file)
{
    // Leemos el fichero
    $txt = file_get_contents($file);
    // Times 12
    $this->SetFont('Times','',12);
    // Imprimimos el texto justificado
    $this->MultiCell(0,5,$txt);
    // Salto de línea
    $this->Ln();
    // Cita en itálica
    $this->SetFont('','I');
    $this->Cell(0,5,'(fin del extracto)');
}

function PrintChapter($num, $title, $file)
{
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->ChapterBody($file);
}
}

$pdf = new PDF();
$title = '20000 Leguas de Viaje Submarino';
$pdf->SetTitle($title);
$pdf->SetAuthor('Julio Verne');
$pdf->PrintChapter(1,'UN RIZO DE HUIDA','20k_c1.txt');
$pdf->PrintChapter(2,'LOS PROS Y LOS CONTRAS','20k_c2.txt');
$pdf->Output();
	*/
	
	//manejo de columnas
	/*
	class PDF extends FPDF
{
protected $col = 0; // Columna actual
protected $y0;      // Ordenada de comienzo de la columna

function Header()
{
    // Cabacera
    global $title;

    $this->SetFont('Arial','B',15);
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(220,50,50);
    $this->SetLineWidth(1);
    $this->Cell($w,9,$title,1,1,'C',true);
    $this->Ln(10);
    // Guardar ordenada
    $this->y0 = $this->GetY();
}

function Footer()
{
    // Pie de página
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(128);
    $this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
}

function SetCol($col)
{
    // Establecer la posición de una columna dada
    $this->col = $col;
    $x = 10+$col*65;
    $this->SetLeftMargin($x);
    $this->SetX($x);
}

function AcceptPageBreak()
{
    // Método que acepta o no el salto automático de página
    if($this->col<2)
    {
        // Ir a la siguiente columna
        $this->SetCol($this->col+1);
        // Establecer la ordenada al principio
        $this->SetY($this->y0);
        // Seguir en esta página
        return false;
    }
    else
    {
        // Volver a la primera columna
        $this->SetCol(0);
        // Salto de página
        return true;
    }
}

function ChapterTitle($num, $label)
{
    // Título
    $this->SetFont('Arial','',12);
    $this->SetFillColor(200,220,255);
    $this->Cell(0,6,"Capítulo $num : $label",0,1,'L',true);
    $this->Ln(4);
    // Guardar ordenada
    $this->y0 = $this->GetY();
}

function ChapterBody($file)
{
    // Abrir fichero de texto
    $txt = file_get_contents($file);
    // Fuente
    $this->SetFont('Times','',12);
    // Imprimir texto en una columna de 6 cm de ancho
    $this->MultiCell(60,5,$txt);
    $this->Ln();
    // Cita en itálica
    $this->SetFont('','I');
    $this->Cell(0,5,'(fin del extracto)');
    // Volver a la primera columna
    $this->SetCol(0);
}

function PrintChapter($num, $title, $file)
{
    // Añadir capítulo
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->ChapterBody($file);
}
}

$pdf = new PDF();
$title = '20000 Leguas de Viaje Submarino';
$pdf->SetTitle($title);
$pdf->SetAuthor('Julio Verne');
$pdf->PrintChapter(1,'UN RIZO DE HUIDA','20k_c1.txt');
$pdf->PrintChapter(2,'LOS PROS Y LOS CONTRAS','20k_c2.txt');
$pdf->Output();
*/
//TABLAS
class PDF extends FPDF
{
// Cargar los datos
function LoadData($file)
{
    // Leer las líneas del fichero
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Tabla simple
function BasicTable($header, $data)
{
    // Cabecera
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

// Una tabla más completa
function ImprovedTable($header, $data)
{
    // Anchuras de las columnas
    $w = array(40, 35, 45, 40);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

// Tabla coloreada
function FancyTable($header, $data)
{
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Cabecera
    $w = array(40, 35, 45, 40);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Títulos de las columnas
$header = array('País', 'Capital', 'Superficie (km2)', 'Pobl. (en miles)');
// Carga de datos
$data = $pdf->LoadData('paises.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();




//Enlaces
/*
class PDF extends FPDF
{
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
    // Intérprete de HTML
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Etiqueta de apertura
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Etiqueta de cierre
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modificar estilo y escoger la fuente correspondiente
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Escribir un hiper-enlace
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
}

$html = 'Ahora puede imprimir fácilmente texto mezclando diferentes estilos: <b>negrita</b>, <i>itálica</i>,
<u>subrayado</u>, o ¡ <b><i><u>todos a la vez</u></i></b>!<br><br>También puede incluir enlaces en el
texto, como <a href="http://www.fpdf.org">www.fpdf.org</a>, o en una imagen: pulse en el logotipo.';

$pdf = new PDF();
// Primera página
$pdf->AddPage();
$pdf->SetFont('Arial','',20);
$pdf->Write(5,'Para saber qué hay de nuevo en este tutorial, pulse ');
$pdf->SetFont('','U');
$link = $pdf->AddLink();
$pdf->Write(5,'aquí',$link);
$pdf->SetFont('');
// Segunda página
$pdf->AddPage();
$pdf->SetLink($link);
$pdf->Image('img/iconser.png',10,12,30,0,'','http://www.fpdf.org');
$pdf->SetLeftMargin(45);
$pdf->SetFontSize(14);
$pdf->WriteHTML($html);
$pdf->Output();
*/
?>