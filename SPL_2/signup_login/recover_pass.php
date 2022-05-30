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

            require 'db.php';


            

             if (isset($_POST['password-reset-token']) &&  $_POST['email']) {

                  $email=$_POST['email'];
                 // $con=mysqli_connect('localhost', 'root', '');
                 // mysqli_select_db($con, 'system_database');
                // $select = mysqli_query($con,"select email,password from faculty_info  where email='$email'");
                // if (mysqli_num_rows($select) == 1) {
                //     while ($row = mysqli_fetch_array($select)) {
                 //         $email = ($row['email']);
                 //         $options = array("cost"=>4);
                 //         $pass=($row['password']);                 //         $pass = password_hash($pass, PASSWORD_BCRYPT, $options); //($row['password']);
                 //     }


                 $result = mysqli_query($conn,"SELECT * FROM faculty_info WHERE email='$email'");
 
                $row= mysqli_fetch_array($result);
                
                 if($row)
                {
                    
                     $token = md5($email).rand(10,9999);
                
                     $expFormat = mktime(
                     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
                     );
                
                     $expDate = date("Y-m-d H:i:s",$expFormat);

                     $update = mysqli_query($conn,"UPDATE faculty_info set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $email . "'");

                      $link = "<a href='http://localhost/SPL_2/signup_login/reset.php?key=" . $email ."&password-reset-token=".$token. "'>Click To Reset password</a>";
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
                    $mail->Password = "Sys123!@#";
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
                else{
                    echo "Invalid Email Address! Go back";
                  }
            }   
            
            ?>

        
            <form action=" " method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                        <input type="submit" name="password-reset-token" class="btn btn-primary">
            </form>
          
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html> 






 
