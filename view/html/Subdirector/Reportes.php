<?php 
require_once '../../../app/modelo/projects.class.php';
$users = Projects::singleton();
$nom = $_REQUEST["m"];
if ($nom ==1){
$data = $users->listar_proyectos();
}else if($nom ==2){
$data = $users->listar_proyectos_CualquierCampo();
}else{ header("Location: ConsultarProyectos.php");}
$jona=0;
foreach ($data as $fila): 
$jona=$jona+1;
endforeach;
include ("../../fpdf/fpdf.php");
$size = 'legal';
$pdf = new FPDF();
$pdf->AddPage($size);
$pdf->SetFont('Arial','',10);

//$pdf->Image();

$pdf->Cell(230,10,'Reporte De Proyecto SIGPI',0);
$pdf->SetFont('Arial','',9);
ini_set('date.timezone','America/Bogota');
$pdf->Cell(50,10,'Fecha: '.date('d-m-Y-g:i A').'',0);
$pdf->Ln(15);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(100,8,'',0);
$pdf->Cell(100,8,'LISTADO DE PROYECTOS',0);
$pdf->Ln(8);
$pdf->Cell(100,8,'CTPI(Centro de Teleinformatica y Produccion Industrial)',0,0);
$pdf->Ln(5);
$pdf->Cell(100,8,'CCS(Centro de Comercio y Servicios)',0,0);
$pdf->Ln(5);
$pdf->Cell(100,8,'CA(Centro Agropecuario)',0,0);
$pdf->Ln(9);
$pdf->Cell(40,8,'Total de proyectos:',0,0);
$pdf->Cell(25,8,$jona,1,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(100,8,'Nombre',1,0,'C');
$pdf->Cell(15,8,'Fase',1,0,'C');
$pdf->Cell(20,8,'Condicion',1,0,'C');
$pdf->Cell(20,8,'Intervalo',1,0,'C');
$pdf->Cell(15,8,'Centro',1,0,'C');
$pdf->Cell(30,8,'Presupuesto',1,0,'C');
$pdf->Cell(20,8,'Numero Ficha',1,0,'C');
$pdf->Cell(20,8,'Fecha Inicio',1,0,'C');
$pdf->Cell(20,8,'Fecha Fin',1,0,'C');
$pdf->Ln(8);
$pdf->SetFont('Arial','',8);

//consulta de reportes:

if(empty($data)){
	$pdf->Cell(260,8,'No hay registros',1,0,'C');
	
	}else{
foreach ($data as $fila): 
$pdf->Cell(100,8,$fila['Pro_Nombre'],1,0);
$pdf->Cell(15,8,$fila['Pro_Fase'],1,0,'C');
$pdf->Cell(20,8,$fila['Pro_CondicionDos'],1,0,'C');
$pdf->Cell(20,8,$fila['Pro_Intervalo'],1,0,'C');
$pdf->Cell(15,8,$fila['Pro_Centro'],1,0,'C');
$pdf->Cell(30,8,$fila['Pro_Presupuesto'],1,0,'C');
$pdf->Cell(20,8,$fila['Pro_Ficha'],1,0,'C');
$pdf->Cell(20,8,$fila['Pro_Fecha_Inicio'],1,0,'C');
$pdf->Cell(20,8,$fila['Pro_Fecha_Fin'],1,0,'C');
$pdf->Ln(8);


 endforeach;
}

$pdf->Output();
?>
