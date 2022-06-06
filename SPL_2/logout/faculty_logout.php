<?php

if(empty($_SESSION['email']) && empty($_COOKIE['email'])|| empty($_SESSION['password']&& empty($_COOKIE['password'])))
  {

    header('location: ../signup_login/login-form/facultyLogin.php');


  }
  
  
  
  
  if(isset($_POST['log_out']))
  {

    setcookie("email","",time()-86400,'/');
    setcookie("password","",time()- 86400,'/');
    session_unset();
    session_destroy();
    $_SESSION = array();
    header('location: ../signup_login/login-form/facultyLogin.php');


  }
?>