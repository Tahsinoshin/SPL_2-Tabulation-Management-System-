<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
   


</head>
<body>
<div class="container " >
<img src="DU-logo.svg" height="100" width="200"  class="rounded mx-auto d-block" alt="DU logo">
    <div class="row" >
        <?php
            if(isset($_POST['signup']))
            {
                extract($_POST);
                $pswrd = $_POST["password"];
                $pswrdCnfrm = $_POST["passwordConfirm"];
                $eml = $_POST["email"];
                if(strlen($fname)<3)
                {
                    $error[]='Please enter first name using three characters at least';
                }

                if(strlen($fname)>30)
                {
                    $error[]='First Name must not exceed 30 characters';
                }
                if(!preg_match("/^[A-Za-z _]*[A-Za-z]+[A-Za-z _]*$/", $fname))
                {
                    $error[]='Invalid first name. Please enter letters without any digit or special symbols.';
                }

                if(strlen($lname)<3)
                {
                    $error[]='Please enter last name using three characters at least';
                }

                if(strlen($lname)>30)
                {
                    $error[]='Last Name must not exceed 30 characters';
                }
                if(!preg_match("/^[A-Za-z _]*[A-Za-z]+[A-Za-z _]*$/", $fname))
                {
                    $error[]='Invalid last name. Please enter letters without any digit or special symbols.';
                }

                if(strlen($username)<3)
                {
                    $error[]='Please enter username using three characters at least';
                }

                if(strlen($username)>50)
                {
                    $error[]='Username must not exceed 50 characters';
                }
                if(!preg_match("/^[A-Za-z _]*[A-Za-z]+[A-Za-z _]*$/", $fname))
                {
                    $error[]='Invalid username. Please enter lowercase letters without any space, digit or special symbols at the start.';
                }
                //if(!preg_match( "/^[A-Za-z-\.]+@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})(\.du\.ac\.bd)$/", $email))
                // if(!preg_match( "/^[A-Za-z-\.][0-9]+@[A-Za-z-\.]+(du\.ac\.bd)$/", $eml))
                // {
                //     echo $eml;
                //     $error[]='Invalid email! Please enter your email address with du.ac.bd extention';
                // }
                if($passwordConfirm='')
                {
                    $error[]= 'Please Confirm the password';
                }
                if($pswrd!=$pswrdCnfrm)
                {
                    echo $_POST["password"];
                    echo $_POST["passwordConfirm"];
                    $error[]='Password does not match!';
                }
                if(strlen($password)<5)
                {
                    $error[]= 'The password is only 6 character long! make a strong password!';
                }
                if(strlen($password)>20)
                {
                    $error[]='Password: Max length must not exceed 20 characters ';
                }

                $sql= "select * from faculty_info where(username='$username' or email='$email');";
                $result= mysqli_query($db_conn,$sql);

                if(mysqli_num_rows($result)>0)
                {
                    $row=mysqli_fetch_assoc($result);

                    if($username==$row['username'])
                    {
                        $error[]= 'Username already exists';
                    }
                    if($email==$row['email'])
                    {
                        $error[]= 'Email already exists';
                    }
                }

                if(!isset($error))
                {
                    $date = date('Y-m-d');
                    //$options = array("cost"=>4);
                    //$password= password_hash($password, PASSWORD_BCRYPT, $options);
                    $password= md5($password); 

                    $result=mysqli_query($db_conn, "INSERT INTO faculty_info values('','$fname', '$lname', '$username', '$email','$institute_department', '$password')");

                    if($result)
                    {
                        $done=2;
                    }
                    else
                    {
                        $error[]='Failed:something went wrong'; 
                    }
                }


            }
        ?>
        <div class="col-sm-4"></div>
            <?php
                if(isset($error))
                {
                    foreach($error as $error)
                    {
                        echo '<p class="errormsg"> &#x26AD;'.$error.'</p>';
                    }
                }


            ?>
        <div class="col-sm-4 d-flex justify-content-center text-center" >
            <?php
            if(isset($done)){
            ?>
            <div class="successmsg">
                <span style="font: size 100px;"> &#9989;</span><br>
                You have successfully registered!
                <br><p style="font-size:20px"><a href="login.php" >Login here...</a></p>
            </div>
            <?php
            }else{
            ?>
            <div class="signup_form w-100 p-3" >
                <form action="" method="POST" >
                    <div class="form-group">
                        <label class="label_text"> First Name</label>
                        <input type="text" class="form-control" name="fname"  required="">

                    </div>
                    <div class="form-group">
                        <label class="label_text"> Last Name</label>
                        <input type="text" class="form-control" name="lname" value="<?php if(isset($error)){echo $lname;} ?>" required="">

                    </div>
                    <div class="form-group">
                        <label class="label_text"> Username</label>
                        <input type="text" class="form-control" name="username" value="<?php if(isset($error)){echo $username;} ?>" required="">

                    </div>
                    <div class="form-group">
                        <label class="label_text"> Email</label>
                        <input type="text" class="form-control" name="email" value="<?php if(isset($error)){echo $email;} ?>" required="">

                    </div>
                    <div class="form-group">
                        <label class="label_text">Department/Institute</label>
                        <input type="text" class="form-control" name="institute_department" required="">

                    </div>
                    <div class="form-group">
                        <label class="label_text">Password</label>
                        <input type="password" class="form-control" name="password" required="">

                    </div>
                    <div class="form-group">
                        <label class="label_text">Confirm Password</label>
                        <input type="password" class="form-control" name="passwordConfirm" required="">

                    </div>
                    <br>   
                    <button type="submit" name="signup" class="btn btn-primary  ">Sign Up</button>
                    <p> Have an account? <a href="login.php">Login</a></p>
                    <?php  } ?>
                </form>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>