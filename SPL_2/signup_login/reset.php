<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <img src="DU-logo.svg" height="150" width="250" class="rounded mx-auto d-block" alt="DU logo">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-4 d-flex justify-content-center text-center">
                <div class="faculty_form">
                <?php
if($_GET['key'])
{
include "db.php";
$email = $_GET['key'];
$query = mysqli_query($conn,
"SELECT * FROM `faculty_info` WHERE `email`='".$email."';"
);
if (mysqli_num_rows($query) > 0) {
$row= mysqli_fetch_array($query);
if($row){ ?>
<form action="" method="post">
<input type="hidden" name="email" value="<?php echo $email;?>">
<div class="form-group">
<label for="exampleInputEmail1">Password</label>
<input type="password" name='password' class="form-control">
</div>                
<div class="form-group">
<label for="exampleInputEmail1">Confirm Password</label>
<input type="password" name='cpassword' class="form-control">
</div>
<input type="submit" name="new-password" class="btn btn-primary">
</form>
<?php } } else{
echo 'This forget password link has been expired';
};
};
?>
                </div>
            </div>
        </div>
    </div>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
<?php
if(isset($_POST['password']) && $_POST['email'])
{
include "db.php";
$emailId = $_POST['email'];
$password = md5($_POST['password']);
$query = mysqli_query($conn,"SELECT * FROM `faculty_info` WHERE `email`='".$emailId."'");
$row = mysqli_num_rows($query);
if($row){
mysqli_query($conn,"UPDATE faculty_info set  password='" . $password . "' WHERE email='" . $emailId . "'");
echo '<p>Congratulations! Your password has been updated successfully.</p><a href="facultyLogin.php">Login</a>';
}else{
echo "<p>Something goes wrong. Please try again</p>";
}
}
?>