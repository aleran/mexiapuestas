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


$sql = "SELECT n.sorteo, s.fecha FROM nombre_sorteos n JOIN sorteos s ON n.id=s.nombre_sorteo WHERE s.id='".$_POST["sorteo"]."'";
$rs=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($rs);

$fecha_hoy=date("Y-m-d");
//~ Ingreo de datos en la hojda de excel
$objPHPExcel->getActiveSheet()->SetCellValue("A1", "Fecha");
$objPHPExcel->getActiveSheet()->SetCellValue("A2", "$fecha_hoy");
$objPHPExcel->getActiveSheet()->SetCellValue("B1", "Sorteo");
$objPHPExcel->getActiveSheet()->SetCellValue("B2", "$row[sorteo]");
$objPHPExcel->getActiveSheet()->SetCellValue("C1", "Fecha Sorteo");
$objPHPExcel->getActiveSheet()->SetCellValue("C2", "$row[fecha]");


	$objPHPExcel->getActiveSheet()->SetCellValue("A4", "Números");
	$objPHPExcel->getActiveSheet()->SetCellValue("B4", "Fracciones");


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



	$sql = "SELECT * FROM loteria_frac WHERE id_sorteo='".$_POST["sorteo"]."' AND fracciones > 0 ORDER BY numeros";
	$rs=mysqli_query($mysqli, $sql);

$conta=5;

while($row=mysqli_fetch_array($rs)) {

		$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow("A",$conta,$row["numeros"], PHPExcel_Cell_DataType::TYPE_STRING);
	
		$objPHPExcel->getActiveSheet()->SetCellValue("B$conta", "$row[fracciones]");

	


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