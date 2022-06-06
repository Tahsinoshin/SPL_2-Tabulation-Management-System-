<?php
include "../signup_login/config.php";

$sucess="";
$error="";
$errorFlag=0;

if(isset($_POST['reset_password']))
    {
        if($_POST['id'] == ""  )
        
        {
            $errorFlag++;
            $error=$error."You need to provide a valid staff ID.<br>";

        }


        else if($_POST['password'] == "")
        
        {
            $errorFlag++;
            $error=$error."You need to provide a new password.<br>";

        }

        else if($_POST['password_conf'] == "")
        
        {
            $errorFlag++;
            $error=$error."You need to confirm the new password.<br>";

        }

        else if($_POST['password'] != $_POST['password_conf'])
        {
            $errorFlag++;
            $error=$error."Your confirmed password didn't match.<br>";
        }

        $id=mysqli_real_escape_string($db_conn,$_POST['id']);
        $password=md5(mysqli_real_escape_string($db_conn,$_POST['password'])) ;
        
        $tempQuery='SELECT * FROM `faculty_info` WHERE id="'.$id.'"';
      
        $temp=mysqli_query($db_conn,$tempQuery);
        
        if(mysqli_num_rows($temp) == 0)
        {
              $errorFlag++;
              $error=$error."This  ID/Username is invalid!";
              echo $error;
        }




        if($errorFlag == 0)

        {
            $query="
            UPDATE `faculty_info`
            SET password='$password'
            WHERE id='$id;
            
            ";

            $result=mysqli_query($db_conn,$query);

            if($result)
            {
                $sucess=$sucess."The password reset has been successful.<br>";

                echo $sucess;
            }
            
            



        }


    }
?>