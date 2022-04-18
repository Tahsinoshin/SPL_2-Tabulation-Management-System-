<?php

//echo"lgoin process page";
//echo"<script>  alert('invalid credentials')</script>";

// echo "<script>console.log('Debug Obje');</script>";


// header("Location:faculty_dashboard.php");
 if(isset($_POST['admin_login'])){
    session_start();
    extract($_POST);
    //echo "dhukse";

    $con = mysqli_connect('localhost','root','', 'system_database');

    $username= $_POST['username'];
    // echo"$email";

    $pass=$_POST['password'];
    // echo"$pass";
    //$options = array("cost"=>4);
    $send_pass=$pass;
    //echo $send_pass;

    //$send_pass = password_hash($pass, PASSWORD_BCRYPT, $options);

    $send_pass = md5($send_pass);

    //echo $send_pass;

    $s = "SELECT * from admin_info where username= '$username' && password= '$send_pass'";
    $result = mysqli_query( $con, $s);

    $num = mysqli_num_rows( $result);

    if($num == 1){
       // echo $num;
        $_SESSION['username']=$username;
        echo "login successful";
        header('location:admin_dashboard.php');
    }
    else {
        echo"login failed". $num;
         header('location: adminLogin.php');
    }
}

?>