<?php 
ob_start ();
include('func_fpdf.php');
//include('controlador/ctl_visita.php');

//Clase en blanco para FPDF

class PDF extends PDF_MC_Table{
    /*
   * Funciones para traer los datos del documento.
   * */



     function Footer(){ //funcion para crear el pie de pagina
    $this->SetY(-40);
     //Posicion a 1.5 cm del final de la pagina.
    $this->SetFont('Helvetica', '', 10);
    $this->SetTextColor(68, 68, 68);
    $this->SetDrawColor(06, 151, 38);
    $this->Cell(0, 8, 'Fecha de Impresion: '.date('d-m-Y'), 0, 1,'R',0,''); 
    $this->SetFont('Helvetica', '', 12);
    $this->SetTextColor(68, 68, 68);
    $this->SetDrawColor(9,170,97);
    $this->Cell(0, 10, "Pagina ".$this->PageNo().'', 'B', 1, 'C');
    //$this->Cell(40, 20, "", 0, 0, 'L', $this->Image('.../../img/reportes_logo.png', 11, 260, 0, 10));
    $this->SetFont('Helvetica', '', 10);
    $this->Cell(0, 20, utf8_decode("Paseo del Mesón 7, Jurica, 76100 Santiago de Querétaro, Qro."), 0, 1, 'C', 0,"");
  
  }

  function Header(){    
    $this->SetFont('Helvetica', 'B', 16); //Arial 15 Negrita       
    $this->Cell(95,15,'',0,0,'C',$this->Image('reportes_logo.png',10,4,22));
    $this->SetTextColor(68, 68, 68);
    $this->Cell(10, 5, "..:: LINK - RESIDENCIAL ::..", 0, 0, 'C',0);
    $this->SetFont('Helvetica', 'B', 12); //Arial 15 Negrita     
    $this->Cell(-10, 15, utf8_decode('Invitación'), 0, 0,'C',0);
      
    //Linea Verde
    $this->SetDrawColor(9,170,97);
    $this->Line(10, 28, 206, 28);
   // $this->Cell(85, 15, $this->fecha, 0, 0,'R',0);
    //Se da un salto de linea de 25
        $this->Ln(25);
  }

  function ImprimirTexto($file){
    //Leemos el archivo de texto    
    $txt = file_get_contents($file);
    $this->SetFont('Helvetica', '', 12); //Fuente, Imprimir texto normal, Tamaño de fuente
    $this->MultiCell(0, 5, $txt); //Ancho ajustable al margen de la hoja, alto de la celda, texto a imprimir
    $this->MultiCell(0, 5, $txt, 0, 'J'); //Ancho ajustable al margen de la hoja, alto de la celda, texto a imprimir, celda sin borde, alineacion texto
  }
  
  //Cabecera de la tabla a imprimir
  function cabecera($cabecera){
    $this->SetX(20);
    $this->SetFont('Helvetica', 'B', 15);
    foreach ($cabecera as $columna){
      $this->Cell(70, 7, $columna, 1, 2, 'L');
    }
  }
}


$pdf = new PDF('P','mm','Legal');
	
	
	$pdf->AddPage();
	$pdf->AliasNbPages();
    $pdf->SetAutoPageBreak(true, 40);
    


$pdf->SetTextColor(68, 68, 68);
$pdf->SetWidths(array(199));
$pdf->DibBord(array(0));
$pdf->SetAligns(array('L'));
$pdf->Row(array(utf8_decode('Estimado (a) Daniel')));




$pdf->Ln(10);

$pdf->SetTextColor(68, 68, 68);
$pdf->SetWidths(array(199));
$pdf->DibBord(array(0));
$pdf->SetAligns(array('L'));
$pdf->Row(array(utf8_decode( "Usted ha recibido una invitación.")));

$pdf->Ln(10);


$pdf->SetTextColor(68, 68, 68);
$pdf->SetWidths(array(199));
$pdf->DibBord(array(0));
$pdf->SetAligns(array('L'));
$pdf->Row(array(utf8_decode('Andrea Hernández le ha enviado una autorización para ingresar a Link-Residencial, para poder acceder por favor presente el siguiente mensaje.')));

$pdf->Ln(10);





$pdf->Ln(3);


$pdf->SetTextColor(68, 68, 68);
$pdf->SetWidths(array(199));
$pdf->DibBord(array(0));
$pdf->SetAligns(array('L'));
$pdf->Row(array(' '.chr(143).' '.utf8_decode("Dirección: Ixmiquilpan")));

$pdf->Ln(3);

$pdf->SetTextColor(68, 68, 68);
$pdf->SetWidths(array(199));
$pdf->DibBord(array(0));
$pdf->SetAligns(array('L'));
$pdf->Row(array(' '.chr(143).' '.utf8_decode("Fecha Programada: 19/05/2021")));

$pdf->Ln(3);


$pdf->SetTextColor(68, 68, 68);
$pdf->SetWidths(array(199));
$pdf->DibBord(array(0));
$pdf->SetAligns(array('L'));
$pdf->Row(array(' '.chr(143).' '.utf8_decode("Código QR: 123")));

$pdf->Ln(5);



   $pdf->Ln(5);
             
             $imagen="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=123&.png";

                            
              $pdf->Cell( 199, 30, $pdf->Image($imagen, $pdf->GetX()+65, $pdf->GetY()+3, 50,50), 0, 1, 'L' );






$pdf->Output();
?>
