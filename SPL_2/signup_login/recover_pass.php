<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password recovery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container d-flex justify-content-center " style="margin-top: 100--0gfpx;">
        <div class="row">


            <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            require 'D:\xampp\composer\vendor\autoload.php';
            require 'D:\xampp\composer\vendor\phpmailer\phpmailer\src\PHPMailer.php';

            //require_once('../vendor/autoload.php');


            

            if (isset($_POST['submit_email']) &&  $_POST['email']) {

                 $email=$_POST['email'];
                // $con=mysqli_connect('localhost', 'root', '');
                // mysqli_select_db($con, 'system_database');
                // $select = mysqli_query($con,"select email,password from faculty_info  where email='$email'");
                // if (mysqli_num_rows($select) == 1) {
                //     while ($row = mysqli_fetch_array($select)) {
                //         $email = ($row['email']);
                //         $options = array("cost"=>4);
                //         $pass=($row['password']);
                //         $pass = password_hash($pass, PASSWORD_BCRYPT, $options); //($row['password']);
                //     }
                     $link = "<a href='http://localhost/SPL_2/signup_login/reset.php?key=" . $email . "'>Click To Reset password</a>";
                //     // require 'D:\xampp\composer\vendor\autoload.php';
                    // require 'D:\xampp\composer\vendor\phpmailer\phpmailer\src\PHPMailer.php';

// require("/home/site/libs/PHPMailer-master/src/PHPMailer.php");
// require("/home/site/libs/PHPMailer-master/src/SMTP.php");
            
//require("\home\site\libs\PHPMailer-master\src\PHPMailer.php");
                    require'D:\xampp\composer\vendor\phpmailer\phpmailer\src\SMTP.php';
                    //$mail = new PHPMailer(true);
                    $mail = new PHPMailer();
                    $mail->SMTPDebug = 2; 
                    $mail->IsSMTP();
                    // enable SMTP authentication
                    $mail->SMTPAuth = true;
                    // GMAIL username
                    $mail->Username = "systemmailer123@gmail.com";
                    // GMAIL password
                    $mail->Password = "sys!@#123";
                    $mail->SMTPSecure = "ssl";
                    // sets GMAIL as the SMTP server
                    $mail->Host = "smtp.gmail.com";
                    // set the SMTP port for the GMAIL server
                    $mail->Port = "465";
                    $mail->From = 'systemmailer123@gmail.com';
                    $mail->FromName = 'system admin';
                    $mail->AddAddress($email, '');
                    $mail->Subject  =  'Reset Password';
                    $mail->IsHTML(true);
                    $mail->Body    = $link;
                    if ($mail->Send()) {
                        echo "Check Your Email and Click on the link sent to your email";
                    } else {
                        echo "Mail Error - >" . $mail->ErrorInfo;
                    }
                }   
            
            ?>


            <form method="post" action=" ">
                <div class="mb-3">
                    <p>Enter Email Address To Send Password Link</p>
                    <input type="text" name="email">
                </div>
                <button type="submit"  name="submit_email" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>