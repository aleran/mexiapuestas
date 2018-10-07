<?php
include("conexion/conexion.php");
include("sesiones/time_sesion.php");

include("lib/PHPExcel.php");

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Ing. Alejandro Rangel");
$objPHPExcel->getProperties()->setTitle("Chances del dia");
$objPHPExcel->createSheet(0);
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Chances del dia");
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
$estilo1 = new PHPExcel_Style();
$estilo1->applyFromArray(
  array('fill' => array(
      'type' => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('argb' => '800000')
    ),
    'borders' => array( //bordes
      'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    )
));
$estilo2 = new PHPExcel_Style();
$estilo2->applyFromArray(
  array('fill' => array(
      'type' => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('argb' => 'DCDCDC')
    ),
    'borders' => array( //bordes
      'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    )
));




$fecha_hoy=date("Y-m-d");
//~ Ingreo de datos en la hojda de excel
$objPHPExcel->getActiveSheet()->SetCellValue("B1", "Fecha");
$objPHPExcel->getActiveSheet()->SetCellValue("B2", "$fecha_hoy");
$objPHPExcel->getActiveSheet()->SetCellValue("C1", "Chances de Hoy");


	$objPHPExcel->getActiveSheet()->SetCellValue("A4", "Codigo");
	$objPHPExcel->getActiveSheet()->SetCellValue("B4", "Agencia");
	$objPHPExcel->getActiveSheet()->SetCellValue("C4", "Sorteo");
	$objPHPExcel->getActiveSheet()->SetCellValue("D4", "Cedula | Usuario");
	$objPHPExcel->getActiveSheet()->SetCellValue("E4", "Fecha y Hora");
	$objPHPExcel->getActiveSheet()->SetCellValue("F4", "Números");
	$objPHPExcel->getActiveSheet()->SetCellValue("G4", "Monto");
	$objPHPExcel->getActiveSheet()->SetCellValue("H4", "Premio");


$objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);
$objPHPExcel->getActiveSheet()->getStyle("A4:H4")->getFont()->getColor()->applyFromArray(
	array(
	'rgb' => '#251919'
	)
);





	$sql = "SELECT l.*, a.agencia, n.sorteo, n.dia FROM loteria  l JOIN agencias a ON l.agencia=a.id JOIN sorteos s ON s.id=l.id_sorteo  JOIN nombre_sorteos n ON n.id=s.nombre_sorteo WHERE l.fecha ='2018-08-25'";
	$rs=mysqli_query($mysqli, $sql);

$conta=5;

while($row=mysqli_fetch_array($rs)) {

		if ($row["cedula"] !="") {
			$sql_user = "SELECT nombre, apellido FROM usuarios WHERE cedula='".$row["cedula"]."'";
			$rs_user=mysqli_query($mysqli, $sql_user);
			$row_user=mysqli_fetch_array($rs_user);
			$usuario= $row_user["nombre"]." ".$row_user["apellido"];
			
		}
		$fecha_hora= $row["fecha"]." ".$row["hora"];

		$objPHPExcel->getActiveSheet()->SetCellValue("A$conta", "$row[codigo]");
		$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$row[agencia]");
		$objPHPExcel->getActiveSheet()->SetCellValue("C$conta", "$row[sorteo]");
		if ($row["cedula"] !="") {
		$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "$usuario");
		}
		else {
			$objPHPExcel->getActiveSheet()->SetCellValue("D$conta", "");
		}
		$objPHPExcel->getActiveSheet()->SetCellValue("E$conta", "$fecha_hora");
		$objPHPExcel->getActiveSheet()->SetCellValue("F$conta", "$row[numeros]");
		$objPHPExcel->getActiveSheet()->SetCellValue("G$conta", "$row[monto]");
		$objPHPExcel->getActiveSheet()->SetCellValue("H$conta", "$row[premio]");

	


$conta++;
}
foreach (range('A', 'Z') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
foreach (range('AA', 'ZZ') as $columnID) {
$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="chances_'.date("Y-m-d").'.xlsx"');
$objWriter->save('php://output');
?>