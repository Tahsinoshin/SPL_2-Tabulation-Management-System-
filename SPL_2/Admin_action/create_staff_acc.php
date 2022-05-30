<?php

$sucess="";
  $error="";
  $errorFlag=0;

  echo"okk";

  if(isset($_POST['create_staff']))
  {

    echo"double okk";
      include "../signup_login/test_db.php";

    if($_POST['staff_id'] == "" )
      
    {
        
        $errorFlag++;
        $error=$error."You need to provide a valid staff ID.<br>";

    }


    else if($_POST['staff_name'] == "")
    
    {
        $errorFlag++;
        $error=$error."You need to provide a name.<br>";

    }

    else if($_POST['staff_phone'] == "")
    
    {
        $errorFlag++;
        $error=$error."You need to provide a phone number.<br>";

    }

    else if($_POST['staff_email'] == "")
    
    {
        $errorFlag++;
        $error=$error."You need to provide an email.<br>";

    }

    


    else if($_POST['password'] == "")
    
    {
        $errorFlag++;
        $error=$error."You need to provide a simple password.<br>";

    }

    else if($_POST['password_conf'] == "")
    
    {
        $errorFlag++;
        $error=$error."You need to confirm the password.<br>";

    }

    else if($_POST['password'] != $_POST['password_conf'])
    {
        $errorFlag++;
        $error=$error."Your confirmed password didn't match.<br>";
    }

    echo $error;

   
    $id=mysqli_real_escape_string($db_conn,$_POST['staff_id']);
    $name=$_POST['staff_name'];
    $phone=$_POST['staff_phone'];
    $password=md5(mysqli_real_escape_string($db_conn,$_POST['password'])) ;
    $email=$_POST['staff_email'];


    $tempQuery='SELECT * FROM `staff_info` WHERE id="'.$id.'"';
  
    $temp=mysqli_query($db_conn,$tempQuery);
    
    if(mysqli_num_rows($temp) > 0)
    {
        echo "error flag increased";
          $errorFlag++;
          $error=$error."This staff account is already registered! Please add another staff.<br>";
    }




    if($errorFlag == 0)

    {

        echo"error flag is zero";
        $query="
        INSERT INTO `staff_info`(`id`, `name`, `phone`, `password`,`email`) VALUES ('$id','$name','$phone','$password','$email')
        
        
        ";

        //echo'<pre>';print_r($query);exit;

        $result=mysqli_query($db_conn,$query);

        if($result)
        {
            $sucess=$sucess."Thanks!The account has been successfully created.<br>";

            echo $sucess;
        }

        else{
            echo"sorry couldn't creat account!";
        }
          

      }




  }
?>