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