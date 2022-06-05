<?php

$sucess="";
$error="";
$errorFlag=0;


 

if(isset($_POST['email']))
{
    $email= $_POST['email'];

        $dbHost="localhost";
        $dbName="test_database";
        $dbUserName= "root";
        $dbPassword="";

        $db_conn= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);

        


        $DBHost="localhost";
        $DBName="system_database";
        $DBUserName= "root";
        $DBPassword="";

        $conn = mysql_connect($DBHost,$DBName,$DBUserName,$DBPassword);
        // another database connection

        
        if(mysqli_num_rows($temp) == 1)
        {
              session_start();
               //$target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/blank/";
                // $target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/marked/";
                // $target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/restricted/";

                // $faculty_query= "SELECT * FROM `faculty_info`where email= '$email' ";
                // $result=mysqli_query($conn,$faculty_query);
                // $data = mysqli_fetch_assoc($result);
                // $program= $data['program'];
                // $year= $data['year'];
                // $semester= $data['semester'];



              if($_POST['course_type'])
              {
                  $course_type= $_POST['course_type'];

                  $tempQuery='SELECT * FROM `modified_files` WHERE faculty_email="'.$email.'" && ".course_type="'.$course_type;
      
                    $temp=mysqli_query($db_conn,$tempQuery);

                    $output=mysqli_fetch_assoc($temp);

                    $filepath=$output['filepath'];
                    $filename=$output['filename'];

                    $target= str_replace("marked","restricted",$filepath);
                    $tempFileName = $_FILES[$filename]['tmp_name'];


                    

                    $result = move_uploaded_file($tempFileName,$target);

                    if($result)
                    {
                        $query="
                        UPDATE `modified_files`
                        SET filepath='$target';
                        WHERE course_type='$course_type'";

                        $db_conn->query($query) or die("Error : ".mysqli_error($db_conn));
            
                        //echo "Your file <html><b><i>".$filename."</i></b></html> has been successfully uploaded";

                        echo "marked final!";
                    }
                    else {			
                        echo "Sorry !!! There was an error in uploading your file";			
                    }
                    mysqli_close($db_conn);
              }

              
        

        else
        {
            $error."Invalid email ID!try again";

            echo $error;
        }
        }


}
              
?>