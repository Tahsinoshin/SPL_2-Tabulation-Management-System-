<?php

//echo"lgoin process page";
//echo"<script>  alert('invalid credentials')</script>";

// echo "<script>console.log('Debug Obje');</script>";


// header("Location:faculty_dashboard.php");
 if(isset($_POST['faculty_login'])){
    session_start();
    extract($_POST);
    //echo "dhukse";

    $con = mysqli_connect('localhost','root','', 'system_database');

    $email= $_POST['email'];
    // echo"$email";

    $pass=$_POST['password'];
    // echo"$pass";
    //$options = array("cost"=>4);
    $send_pass=$pass;
    //echo $send_pass;

    //$send_pass = password_hash($pass, PASSWORD_BCRYPT, $options);

    $send_pass = md5($send_pass);

    //echo $send_pass;

    $s = "SELECT * from faculty_info where email= '$email' && password= '$send_pass'";
    $result = mysqli_query( $con, $s);

    $num = mysqli_num_rows( $result);

    if($num == 1){
       // echo $num;
        $_SESSION['email']=$email;
        echo "login successful";
        header('location:../vishweb/faculty_dashboard.php');
    }
    else {
        echo"login not successful". $num;
         header('location: facultyLogin.php');
    }
}



?>