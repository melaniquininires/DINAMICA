<?php
include_once '../../util/fpdf/fpdf.php';
include_once '../../Control/AbmAuto.php';
include_once '../../Modelo/Auto.php';
include_once '../../Modelo/conector/BaseDatos.php';
include_once '../../Modelo/Persona.php';
//include_once '../../../Control/AbmAuto.php';


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../img/descarga.jpeg',10,6,20);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(60);
    // Title
    $this->Cell(50,10,'Reporte de autos',1,0,'C');
    // Line break
    $this->Ln(20);

    $this->Cell(40,10,'Patente',1,0,'C',0);
    $this->Cell(30,10,'Marca',1,0,'C',0);
    $this->Cell(30,10,"Modelo",1,0,'C',0);
    $this->Cell(40,10,utf8_decode("Nombre Dueño"),1,0,'C',0);
    $this->Cell(40,10,utf8_decode("Apellido Dueño"),1,1,'C',0);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,utf8_decode('Página '.$this->PageNo()).'/{nb}',0,0,'C');
}
}
//prueba

$objAbmAuto = new AbmAuto();
$listaAuto = [];
$null= NULL;
$listaAuto = $objAbmAuto->buscar($null);

//fin prueba
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
foreach($listaAuto as $objAuto){
    $pdf->Cell(40,10,$objAuto["Patente"],1,0,'C',0);
    $pdf->Cell(30,10,$objAuto["Marca"],1,0,'C',0);
    $pdf->Cell(30,10,$objAuto["Modelo"],1,0,'C',0);
    $pdf->Cell(40,10,$objAuto["DniDuenio"]["Nombre"],1,0,'C',0);
    $pdf->Cell(40,10,utf8_decode($objAuto["DniDuenio"]["Apellido"]),1,1,'C',0);


}
$pdf->Output();




/*


$pdf= new FPDF(); //uso el constructor con sus valores por defecto ('P','mm', A4)
$pdf->AddPage(); //creamos una nueva pagina
$pdf->SetFont('Arial','B',16); //Es obligatorio escoger una fuente
$pdf->SetX(10);//margen de la hoja
$pdf->SetY(10); //salto de linea de 10 mm?
$pdf->Cell(40,10,'HOLA MUNDO!, estoy utilizando fpdf',1);//Imprimo una celda
$pdf->SetY(20);
$pdf->Cell(60,10,'Hecho con FPDF.',0,1,'C'); //celda con texto centrado
$pdf->Output();*/
?>