<?php




  //include 'import_sheet.php';
  require('../../vendor/autoload.php');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

  
  error_reporting(E_ALL);
  //date_default_timezone_set('Bangladesh/Dhaka');
  //require_once '../Classes/PHPExcel/IOFactory.php';
  //require_once '../Classes/PHPExcel.php';
  //require('PHPExcel.php');

  session_start();
if(isset($_POST['filename'])){

  $con = mysqli_connect('localhost','root','','test_database');





  //$file_ext_name = $_POST['export_file_type'];
  $fileName = $_POST['filename'];

  $all_data = "SELECT hall, regno, session, classroll, examroll, name FROM student_info ";
  $query_run = mysqli_query($con, $all_data);

//   $spreadsheet = new Spreadsheet();
//   $sheet = $spreadsheet->getActiveSheet();

require_once '../Classes/PHPExcel/IOFactory.php';


/** PHPExcel */require_once '../Classes/PHPExcel.php';

$sheet = PHPExcel_IOFactory::createReader('Excel2007');
$sheet= $sheet->load('$fileName');
$sheet->setLoadAllSheets();
$sheet->setActiveSheetIndex(0);

  if(mysqli_num_rows($query_run) > 0)
  {
    //$rowCount=mysqli_num_rows($query_run);
      //$spreadsheet = new Spreadsheet();
      //$sheet = $spreadsheet->getActiveSheet();
      $count=27;

      while($row = mysqli_fetch_array($query_run)){

        

        // echo  $row['hall'] ;
        // echo  $row['regno'] ;
        // echo  $row['session'] ;
        $sheet->setCellValue('A'.$count, $row['hall']);
        $sheet->setCellValue('B'.$count, $row['regno']);
        $sheet->setCellValue('C'.$count, $row['session']);
        $sheet->setCellValue('D'.$count, $row['classroll']);
        $sheet->setCellValue('E'.$count, $row['examroll']);
        $sheet->setCellValue('F'.$count, $row['name']);

        $count++;
      }





//$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
//$excel2 = $excel2->load('$fileName'); // Empty Sheet

//$sheet->setTitle('$fileName');
//$sheet = $spreadsheet->getActiveSheet();
//$sheet= $spreadsheet->getActiveSheet();

    //   $sheet->setCellValue('A1', 'name');
    //   $sheet->setCellValue('B1', 'roll');
    //   $sheet->setCellValue('C1', 'batch');

     // $rowCount = 2;

     
      // while ($rowCount!=21){

      // //   foreach($query_run as $data)
      // // {
      // //     $sheet->setCellValue('A27:A47', $data['hall']);
      // //     $sheet->setCellValue('B27:B47', $data['regno']);
      // //     $sheet->setCellValue('C27:C47', $data['session']);
      // //     $sheet->setCellValue('D27:D47', $data['classroll']);
      // //     $sheet->setCellValue('E27:E47', $data['examroll']);
      // //     $sheet->setCellValue('F27:F47', $data['name']);
          
         
      // // }

     
      // $rowCount++;

      // }
      

    //   if($file_ext_name == 'xlsx')
    //   {
    //       $writer = new Xlsx($spreadsheet);
    //       $final_filename = $fileName.'.xlsx';
    //   }
    //   elseif($file_ext_name == 'xls')
    //   {
    //       $writer = new Xls($spreadsheet);
    //       $final_filename = $fileName.'.xls';
    //   }
    //   elseif($file_ext_name == 'csv')
    //   {
    //       $writer = new Csv($spreadsheet);
    //       $final_filename = $fileName.'.csv';
    //   }

      // $writer->save($fileName);
      // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      // header('Content-Disposition: attactment; filename="'.urlencode($fileName).'"');
     // $writer->save('php://output');

     $objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
     $objWriter->save('$fileName');

  }
  else
  {
      $_SESSION['message'] = "No Record Found";
      header('Location: import_sheet.php');
      exit(0);
  }

  
}


?>