<?php

    $sucess="";
    $error="";
    $errorFlag=0;

    include "../signup_login/config.php";

    if(isset($_POST['remove_faculty']))
    {
        if($_POST['email'] == ""  )
        
        {
            $errorFlag++;
            $error=$error."You need to provide a valid Email.<br>";

        }

        $email=mysqli_real_escape_string($db_conn,$_POST['email']);

        
    }
?>