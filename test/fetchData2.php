<?php

session_start();

require 'D:\xampp\composer\vendor\autoload.php';

//require_once '.\Classes\PHPExcel\IOFactory.php';
//require_once 'D:\xampp\composer\composer.json\IOFactory.php'; 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;



//require_once 'D:\xampp\php\PEAR';

if(isset($_POST['filename'])){

    $con = mysqli_connect('localhost','root','','test_database');

    //$file_ext_name = $_POST['export_file_type'];
    //$fileName = $_POST['filename'];

    $target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/blank/honors/year/1st/retake/PhysicsHonors1stRetake.xlsx";

    $all_data = "SELECT hall, regno, session, classroll, examroll, name FROM student_info ";
    $query_run = mysqli_query($con, $all_data);

   //// $objPHPExcel = PHPExcel_IOFactory::load($fileName);

   //$objPHPExcel = \PhpOffice\PhpSpreadsheet\IOFactory::load($fileName);

   $objPHPExcel = \PhpOffice\PhpSpreadsheet\IOFactory::load($target);
   // $objPHPExcel = $objPHPExcel->getActiveSheet();

  // $objPHPExcel = $objPHPExcel->getSheetByName($fileName);

   // $objPHPExcel->setActiveSheetIndex(0);

   $preserveSheet=$objPHPExcel->getSheet(0);

    if(mysqli_num_rows($query_run) > 0)
   {
    //$rowCount=mysqli_num_rows($query_run);
      //$spreadsheet = new Spreadsheet();
     
      $count=27;

      while($row = mysqli_fetch_array($query_run)){

        

        // echo  $row['hall'] ;
        // echo  $row['regno'] ;
        // echo  $row['session'] ;
        $preserveSheet->setCellValue('A'.$count, $row['hall']);
        $preserveSheet->setCellValue('B'.$count, $row['regno']);
        $preserveSheet->setCellValue('C'.$count, $row['session']);
        $preserveSheet->setCellValue('D'.$count, $row['classroll']);
        $preserveSheet->setCellValue('E'.$count, $row['examroll']);
        $preserveSheet->setCellValue('F'.$count, $row['name']);

        $count++;
      }





    $objWriter = new Xlsx($objPHPExcel);
    //$objWriter->save($fileName);
    $objWriter->save($target);

   //// $writer = new Xlsx($spreadsheet); 
  
// Save .xlsx file to the files directory 
    //$writer->save('files/demo.xlsx'); 

    echo "success";


}
else
{
    $_SESSION['message'] = "No Record Found";
    header('Location: import_sheet.php');
    exit(0);
}


}
?>