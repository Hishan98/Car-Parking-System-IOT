<?php 
require_once "../Classes/PHPExcel.php";
include('dbconfig.php');
session_start();

//create Excel Object
$excel = new PHPExcel();
$currentdate=date("Y/m/d");

$sqlquery = $_SESSION["sql-query"];
$result=$con-> query($sqlquery);
$rows=2;

if($result-> num_rows >0){

        //Insert Hedings to PHPExcel object
        $excel->setActiveSheetIndex(0)
        ->setCellValue('A1','Invoice number')
        ->setCellValue('B1','Vehicle number')
        ->setCellValue('C1','Parked date')
        ->setCellValue('D1','In Time')
        ->setCellValue('E1','Out Time')
        ->setCellValue('F1','Cost')
        ->setCellValue('G1','Slot ID')
        ->setCellValue('H1','Guard ID');

        while($row = $result-> fetch_assoc()){

               //Insert Hedings to PHPExcel object
                $excel->setActiveSheetIndex(0)
                ->setCellValue('A'.$rows,$row["invoice_num"])
                ->setCellValue('B'.$rows,$row["vehicle_num"])
                ->setCellValue('C'.$rows,$row["parked_date"])
                ->setCellValue('D'.$rows,$row["in_time"])
                ->setCellValue('E'.$rows,$row["out_time"])
                ->setCellValue('F'.$rows,$row["cost"])
                ->setCellValue('G'.$rows,$row["slot_id"])
                ->setCellValue('H'.$rows,$row["guard_id"]); 
                $rows++;
                
        }

}
//set column width
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);

//Title bar style
$excel->getActiveSheet()->getStyle('A1:H1')->applyFromArray(
        array(
                'font'=>array(
                        'bold'=>true
                ),
                'borders'=>array(
                        'allborders'=>array(
                                'style'=> PHPExcel_Style_Border::BORDER_THIN
                        )
                )
        )
);
$excel->getActiveSheet()->getStyle('A1:H1')->getAlignment()->setHorizontal('center');

//Set Data borders
$excel->getActiveSheet()->getStyle('A2:H'.($rows-1))->applyFromArray(
        array(
                'borders'=> array(
                        'outline'=>array(
                                'style' => PHPExcel_Style_Border::BORDER_THIN
                        ),
                        'vertical'=> array(
                                'style' => PHPExcel_Style_Border::BORDER_THIN
                        )
                )
        )
);
$excel->getActiveSheet()->getStyle('A2:H'.($rows-1))->getAlignment()->setHorizontal('center');

//redirect to download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename= "Report.xlsx"');
header('Cache-Control: max-age=0');
//write the results to file
$file = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
$file-> save('php://output');

?>
