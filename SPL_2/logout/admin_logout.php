<?php

if(empty($_SESSION['username']) && empty($_COOKIE['username'])|| empty($_SESSION['password']&& empty($_COOKIE['password'])))
  {

    header("Location: ../signup_login/login-form/adminLogin.php");


  }
  
  
  
  
  if(isset($_POST['log_out']))
  {

    setcookie("username","",time()-86400,'/');
    setcookie("password","",time()- 86400,'/');
    session_unset();
    session_destroy();
    $_SESSION = array();
    header("Location: ../signup_login/login-form/adminLogin.php");


  }
?>