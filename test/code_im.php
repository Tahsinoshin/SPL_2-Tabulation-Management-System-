<?php
session_start();
$con = mysqli_connect('localhost','root','','test_database');

require('../../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

if(isset($_POST['export_excel_btn']))
{
    $file_ext_name = $_POST['export_file_type'];
    $fileName = $_POST['filename'];

    // $student = "SELECT * FROM students";
    // $query_run = mysqli_query($con, $student);

    // if(mysqli_num_rows($query_run) > 0)
    // {
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();

    //     $sheet->setCellValue('A1', 'name');
    //     $sheet->setCellValue('B1', 'roll');
    //     $sheet->setCellValue('C1', 'batch');

    //     $rowCount = 2;
    //     foreach($query_run as $data)
    //     {
    //         $sheet->setCellValue('A'.$rowCount, $data['name']);
    //         $sheet->setCellValue('B'.$rowCount, $data['roll']);
    //         $sheet->setCellValue('C'.$rowCount, $data['batch']);
            
    //         $rowCount++;
    //     }

    //     if($file_ext_name == 'xlsx')
    //     {
    //         $writer = new Xlsx($spreadsheet);
    //         $final_filename = $fileName.'.xlsx';
    //     }
    //     elseif($file_ext_name == 'xls')
    //     {
    //         $writer = new Xls($spreadsheet);
    //         $final_filename = $fileName.'.xls';
    //     }
    //     elseif($file_ext_name == 'csv')
    //     {
    //         $writer = new Csv($spreadsheet);
    //         $final_filename = $fileName.'.csv';
    //     }

    //     // $writer->save($final_filename);
    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attactment; filename="'.urlencode($final_filename).'"');
    //     $writer->save('php://output');

    // }
    // else
    // {
    //     $_SESSION['message'] = "No Record Found";
    //     header('Location: import_sheet.php');
    //     exit(0);
    // }


    // if($con->connect_error){
    //     die("Could not connect". $con->connect_error);
    // }
    // else{
    //     $stmt = $con->prepare("SELECT filepath,filename FROM filedetails where filename=? ");
    //     $stmt->bind_param('s', $filename);
    //     $stmt->execute();
    //     $stmt->bind_result($column1, $column2);
    //     $stmt->fetch();
    //     $filepath=$column1;
    //     $fileName=$column2;

    //     $mimeType = mime_content_type($filepath);

    //     header("pragma: public");
    //     header("Expires:0"); 
    //     header("Cache-Control: max-age");
    //     header("Content-Description:File Transfer");
    //     header("Content-Type:".$mimeType);
    //     header("Content-Length:".(string)(filesize($filepath)));
    //     header("Content-Disposition: attachment; filename".$fileName);
    //     header("Content-Transfer-Encoding:binary\n");

    //     readfile($filepath);

    //     exit();

    // }

    // if (isset($_GET['file_id'])) {
    //     $id = $_GET['file_id'];
    
        // fetch file to download from database
        $sql ="SELECT filepath FROM filedetails WHERE filename=$fileName";
        $result = mysqli_query($con, $sql);
    
        $file = mysqli_fetch_assoc($result);
        $filepath = 'files/' . $file['filename'];
    
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('files/' . $file['name']));
            readfile('files/' . $file['name']);
    
            // Now update downloads count
           // $newCount = $file['downloads'] + 1;
           // $updateQuery = "UPDATE files SET downloads=$newCount WHERE file=$id";
           // mysqli_query($conn, $updateQuery);
            exit;
        }
}

?>