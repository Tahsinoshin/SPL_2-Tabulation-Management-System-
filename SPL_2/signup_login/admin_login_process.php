<!-- <?php

//echo"lgoin process page";
//echo"<script>  alert('invalid credentials')</script>";

// echo "<script>console.log('Debug Obje');</script>";


// header("Location:faculty_dashboard.php");
//  if(isset($_POST['admin_login'])){
//     session_start();
//     extract($_POST);
//     //echo "dhukse";

//     $con = mysqli_connect('localhost','root','', 'system_database');

//     $username= $_POST['username'];
//     // echo"$email";

//     $pass=$_POST['password'];
//     // echo"$pass";
//     //$options = array("cost"=>4);
//     $send_pass=$pass;
//     //echo $send_pass;

//     //$send_pass = password_hash($pass, PASSWORD_BCRYPT, $options);

//     $send_pass = md5($send_pass);

//     //echo $send_pass;

//     $s = "SELECT * from admin_info where username= '$username' && password= '$send_pass'";
//     $result = mysqli_query( $con, $s);

//     $num = mysqli_num_rows( $result);

//     if($num == 1){
//        // echo $num;
//         $_SESSION['username']=$username;
//         echo "login successful";
//         header('location:admin_dashboard.php');
//     }
//     else {
//         echo"login failed". $num;
//          header('location: adminLogin.php');
//     }
// }






//notun code




session_start();

    include "test_db.php"; 

    if(isset($_SESSION['admin_id']) || isset($_COOKIE['admin_id']))
    
    {

        header("Location: admin_dashboard.php");


    }

    $sucess="";
    $error="";
    $errorFlag=0;

    $id=mysqli_real_escape_string($db_conn,$_POST['admin_id']);
    $logPassword=md5(mysqli_real_escape_string($db_conn,$_POST['password']));

    $query="
        
            SELECT * FROM `admin_info`
            WHERE admin_id='$id' && password='$logPassword';
        
        
        ";
        $aunthenticate=mysqli_query($db_conn,$query);

        $result = mysqli_num_rows($aunthenticate);

        if($result)
        {

            
            if($_POST['check'])
            {

                setcookie("admin_id","$id",time()+86400*30,"/");
                setcookie("password","$logPassword",time()+ 86400*30,"/");

            }
            
            while($row=mysqli_fetch_array($aunthenticate)) {

                 $_SESSION['name'] = "Admin";
    
            }
            
            
            $_SESSION['admin_id']=$id;
            $_SESSION['password']=$logPassword;
            header("Location: admin_dashboard.php");

        }

        else if(! $result){

            $error=$error. "The ID doesn't exist.<br>";
            header("Location: adminLogin.php");

        }

?> 



