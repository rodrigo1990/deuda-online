<?php
require('../fpdf.php');

class PDF extends FPDF
{
protected $col = 0; // Columna actual
public $y0;      // Ordenada de comienzo de la columna


function SetCol($col)
{
	// Establecer la posición de una columna dada
	$this->col = $col;
	$x = 0+$col*65;
	$this->SetLeftMargin($x);
	$this->SetX($x);
}


function printData(){}


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

function BasicTable($header, $data)
{	
	$this->SetFont('Arial','B',16);
    // Header
    foreach($header as $col)

        $this->Cell(40,7,$col,0,0,'C',false);
    $this->Ln();
    $this->SetFont('Arial','B',16);
    // Data
    foreach($data as $col)
    	
        $this->Cell(40,7,$col,0,0,'C',false);
    $this->Ln();
}






}


$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(0,6,"Instrucción de pago SICE ",0,1,'C',true);
$pdf->Cell(0,6,"Sr./a: Juan Alberto Juan ",0,1,'C',true);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,6,"Por favor dirijase a una sucursal del Banco Santander Rio dentro del horario bancario por ventanilla (No terminal ni cajero automatico) a realizar el deposito en EFECTIVO acordado por ",0,'C',true);

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,6,"$800",0,1,'C',true);

$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,6,"El cual debe abonar de la siguiente forma: ",0,'C',true);
$pdf->MultiCell(0,6,"Dele la presente instrucción al cajero/a para que realice las dos operaciones detalladas ",0,'C',true);

$header=array('Operacion 1:','Operacion 2:');

$data=array('$500','$250');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetCol(1);

$pdf->BasicTable($header,$data);












$pdf->Ln(4);
// Guardar ordenada
$pdf->y0 = $pdf->GetY();

$pdf->Output();


?>



