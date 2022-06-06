<?php

$sucess="";
$error="";
$errorFlag=0;


// include "../signup_login/test_db.php";

if(isset($_POST['print_by_staff']))
    {
        //include ".././signup_login/test_db.php"; 

        session_start();

        //$target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/blank/";
        //$target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/marked/";
        $target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/restricted/";


        $dbHost="localhost";
        $dbName="test_database";
        $dbUserName= "root";
        $dbPassword="";

        $db_conn= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);


        //$slash= "/";

        $FileName=$_POST['Filename'];

        if($_POST['program'])
        {
            $program= $_POST['program']."/";
            strtolower($program);
            $target.=$program;
        }



        if($_POST['year_sem'])
        {
            $year_sem= $_POST['year_sem']."/";
            strtolower($year_sem);
            $target.=$year_sem;


            if(isset($_POST['year']))
            {
                $year= $_POST['year']."/";
                strtolower($year);
                $target.=$year;
            }
            else if(isset($_POST['semester']))
            {
                $semester= $_POST['semester']."/";
                strtolower($semester);
                $target.=$semester;
            }
        }

        if($_POST['course_type'])
        {
            $course_type= $_POST['course_type']."/";
            strtolower($course_type);
            $target.=$course_type;
        }

        $target= $target.$FileName;
       


        echo $target;

        
        

        // if($_POST['Filename'] == ""  )
        
        // {
        //     $errorFlag++;
        //     $error=$error."You need to provide a valid filename.<br>";

        // }

        //echo$target;


        // staff will print only the final sheet, these sheets will be in modified_files table and restricted folder

        $query ="SELECT filepath FROM modified_files WHERE filename='$FileName' && filepath='$target'";
        $result = mysqli_query($db_conn, $query);

        //echo $result['filepath'];

        $data = mysqli_fetch_assoc($result); 
        $FilePaths= $data['filepath'];

        //echo $FilePaths;
        

        function download_file( $fullPath )
        {
          if( headers_sent() )
            die('Headers Sent');
        
        
          if(ini_get('zlib.output_compression'))
            ini_set('zlib.output_compression', 'Off');
        
        
          if( file_exists($fullPath) )
          {
        
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);

            echo $ext;
        
            switch ($ext) 
            {
            
        
              case "csv":
              case "xls":
              case "xls": $ctype="application/vnd.ms-excel"; break;
            
              default: $ctype="application/force-download";
            }
        
            header("Pragma: public"); 
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private",false); 
            header("Content-Type: $ctype");
            header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: ".$fsize);
            ob_clean();
            flush();
            $getFileContent=readfile( $fullPath );
            
            //echo $getFileContent;
        
          } 
          else
            die('File Not Found');
        
        }
        
        
        
         download_file($FilePaths);
        
        

    }


?>
