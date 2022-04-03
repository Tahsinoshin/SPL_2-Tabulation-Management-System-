<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>
    <div class="container">
    <img src="DU-logo.svg" height="150" width="250"  class="rounded mx-auto d-block" alt="DU logo">
        <div class="row">
            <div class="col-sm-4"> </div>
            <div class="col-sm-4">
                <div class="login_form">
                    <form action="loginProcess.php" method="POST">
                        <div class="mb-3">
                            <label class=" label_txt form-label">Username or Email</label>
                            <input type="text" name="login_var" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label  class=" label_txt form-label">Password</label>
                            <input type="password" name="password" class="form-control" >
                        </div>
                        <br>

                        <button type="submit" name="sublogin" class=" form_btn btn-primary">Login</button>
                    </form>
                    <p style="font: size 12px;text-align:center;margin-top: 10px;"><a href="forgot_password.php" style="color: #00376b;">
                    Forgot Password?</a>
                </p>
                <br>
                <p>Don't have an account? <a href="signup.php" >Sign Up</a></p>
    
                </div>
            </div>
            <div class="col-sm-4"> </div>

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>