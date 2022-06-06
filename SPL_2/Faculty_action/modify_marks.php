<?php

$sucess="";
$error="";
$errorFlag=0;




 include("../Staff_action/test/download.php");

if(isset($_POST['modify_marks']))
{
    // session_start();

    $email= $_POST['email'];
    $course_type= $_POST['course_type'];

    $dbHost="localhost";
    $dbName="test_database";
    $dbUserName= "root";
    $dbPassword="";

    $db_conn= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);

    $tempQuery="SELECT * FROM `modified_files` WHERE faculty_email='$email' && course_type= '$course_type'";
    
    $temp=mysqli_query($db_conn,$tempQuery);

    echo "works here";

    echo mysqli_num_rows($temp);

    if(mysqli_num_rows($temp) > 0)
    {

        $data = mysqli_fetch_assoc($temp); 
        $filepath= $data['filepath'];
        echo $filepath;
        $fileName= $data['filename'];

        download_file($filepath);
    }

    else
    {
        echo "invalid email address";
    }


    // download_file($filepath);


        
}

?>