<?php

$sucess="";
$error="";
$errorFlag=0;

require 'D:\xampp\composer\vendor\autoload.php';

//require_once '.\Classes\PHPExcel\IOFactory.php';
//require_once 'D:\xampp\composer\composer.json\IOFactory.php'; 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;


 include("../Staff_action/test/download.php");

if(isset($_POST['download_by_faculty']))
{
    // session_start();

    $email= $_POST['email'];
    $course_type= $_POST['course_type'];

    // echo $email;
    // echo $course_type;

    $dbHost="localhost";
    $dbName="test_database";
    $dbUserName= "root";
    $dbPassword="";

    $db_conn= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);

    $tempQuery="SELECT * FROM `filedetails` WHERE faculty_email='$email' && course_type= '$course_type'";
    
    $temp=mysqli_query($db_conn,$tempQuery);

    //echo "before query num";

    //echo mysqli_num_rows($temp);



    if(mysqli_num_rows($temp) > 0)
    {

            //echo "after query num";
            //echo $result['filepath'];
            $all_data = "SELECT hall, regno, session, classroll, examroll, name FROM student_info ";
            $query_run = mysqli_query($db_conn, $all_data);


            $data = mysqli_fetch_assoc($temp); 
            $filepath= $data['filepath'];
            $fileName= $data['filename'];


            //echo $filepath;



            $objPHPExcel = \PhpOffice\PhpSpreadsheet\IOFactory::load($filepath);

            $preserveSheet=$objPHPExcel->getSheet(0);

            if(mysqli_num_rows($query_run) > 0)
            {
                //$rowCount=mysqli_num_rows($query_run);
                //$spreadsheet = new Spreadsheet();
        
                $count=27;

                while($row = mysqli_fetch_array($query_run))
                {

            

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
            }



            $objWriter = new Xlsx($objPHPExcel);
            //$objWriter->save($fileName);
            $objWriter->save($filepath);

    

            echo "success";

            download_file($filepath);


    }

        // else
        // {
        //     $_SESSION['message'] = "No Record Found";
        //     header('Location: download_by_faculty_ui.php');
        //     exit(0);
        // }



}
    
    else if(mysqli_num_rows($temp) == 0)
    {
        $errorFlag++;
        $error=$error."Email does not exist!";

        echo "<h4>".$error."</h4>";
        
    }


    //download_file($FilePaths);


   

?>