<?php

$sucess="";
$error="";
$errorFlag=0;


 

if(isset($_POST['email']))
{
    session_start();
    
    $email= $_POST['email'];

        $dbHost="localhost";
        $dbName="test_database";
        $dbUserName= "root";
        $dbPassword="";

        $db_conn= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);

        $query="SELECT * FROM du_faculty_db WHERE faculty_email='$email'";

        $faculty_query=mysqli_query($db_conn,$query);


        
        if(mysqli_num_rows($faculty_query) == 1)
        {
            
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

                  $tempQuery="SELECT * FROM `modified_files` WHERE faculty_email='$email' && course_type='$course_type'";
      
                    $temp=mysqli_query($db_conn,$tempQuery);

                    echo mysqli_num_rows($temp);

                    $output=mysqli_fetch_assoc($temp);

                    $filepath=$output['filepath'];
                    $filename=$output['filename'];

                    $target= str_replace("marked","restricted",$filepath);

                    $target;
                    //$tempFileName = $_FILES[$filename]['tmp_name'];


                    

                    $result = move_uploaded_file($filepath,$target);

                    echo $result;

                    if($result==1)
                    {
                        $query="
                        UPDATE `modified_files`
                        SET filepath='$target';
                        WHERE course_type='$course_type'";

                        $db_conn->query($query) or die("Error : ".mysqli_error($db_conn));
            
                        //echo "Your file <html><b><i>".$filename."</i></b></html> has been successfully uploaded";

                        echo "marked final!";
                    }
                    // else {			
                    //     echo("Error description: " . mysqli_error($db_conn));
			
                    // }
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