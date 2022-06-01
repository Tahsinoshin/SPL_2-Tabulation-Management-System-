<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="../signup_login/login-form/fonts/icomoon/style.css" />

    <link rel="stylesheet" href="../signup_login/login-form/css/owl.carousel.min.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../signup_login/login-form/css/bootstrap.min.css" />

    <!-- Style -->
    <link rel="stylesheet" href="../signup_login/login-form/css/style.css" />

    <title>Create Account</title>
    <style>
      html {
        height: 100%;
      }
      body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: linear-gradient(#141e30, #243b55);
      }

      .login-box {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 400px;
        padding: 40px;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, 0.5);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
        border-radius: 10px;
      }

      .login-box h2 {
        margin: 0 0 30px;
        padding: 0;
        color: #fff;
        text-align: center;
      }

      .login-box .user-box {
        position: relative;
      }

      .login-box .user-box input {
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #fff;
        outline: none;
        background: transparent;
      }
      .login-box .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        pointer-events: none;
        transition: 0.5s;
      }

      .login-box .user-box input:focus ~ label,
      .login-box .user-box input:valid ~ label {
        top: -20px;
        left: 0;
        color: #03e9f4;
        font-size: 12px;
      }

      .login-box form button {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: #03e9f4;
        font-size: 16px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: 0.5s;
        margin-top: 40px;
        letter-spacing: 4px;
      }

      .login-box button:hover {
        background: #03e9f4;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4,
          0 0 100px #03e9f4;
      }

      .login-box button span {
        position: absolute;
        display: block;
      }

      .login-box button span:nth-child(1) {
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #03e9f4);
        animation: btn-anim1 1s linear infinite;
      }

      @keyframes btn-anim1 {
        0% {
          left: -100%;
        }
        50%,
        100% {
          left: 100%;
        }
      }

      .login-box button span:nth-child(2) {
        top: -100%;
        right: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(180deg, transparent, #03e9f4);
        animation: btn-anim2 1s linear infinite;
        animation-delay: 0.25s;
      }

      @keyframes btn-anim2 {
        0% {
          top: -100%;
        }
        50%,
        100% {
          top: 100%;
        }
      }

      .login-box button span:nth-child(3) {
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(270deg, transparent, #03e9f4);
        animation: btn-anim3 1s linear infinite;
        animation-delay: 0.5s;
      }

      @keyframes btn-anim3 {
        0% {
          right: -100%;
        }
        50%,
        100% {
          right: 100%;
        }
      }

      .login-box button span:nth-child(4) {
        bottom: -100%;
        left: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(360deg, transparent, #03e9f4);
        animation: btn-anim4 1s linear infinite;
        animation-delay: 0.75s;
      }

      @keyframes btn-anim4 {
        0% {
          bottom: -100%;
        }
        50%,
        100% {
          bottom: 100%;
        }
      }
    </style>
  </head>


  <body style="background: linear-gradient(#99ffff, #3586ff)">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="../signup_login/login-form/images/vector.svg" alt="Image" class="img-fluid" />
          </div>
          <div class="col-md-6 contents">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="mb-4"></div>

                <div
                  class="login-box"
                  style="margin-top: 60%; margin-left: 20%"
                >
                  <img
                    style="margin-left: 42%; margin-bottom: 3%"
                    src="../DU-logo.svg"
                    heigh="50px"
                    width="50px"
                    alt=""
                  />
                  <h2>Create Staff Account</h2>
                  <form action="create_staff_acc.php" method="POST">
                    <div class="user-box">
                    <input type="text" name="staff_id" value="" required="">
                      <label>Staff ID</label>
                    </div>
                    <div class="user-box">
                    <input type="text" name="staff_name" value="" required="">
                      <label>Staff Name</label>
                    </div>

                    <div class="user-box">
                    <input type="text" name="staff_phone" value="" required="">
                    <label>Phone Number</label>
                    </div>

                    <div class="user-box">
                    <input type="text"  name="staff_email" value="" required="">
                    <label>Staff Email</label>
                    </div>

                    <div class="user-box">
                    <input type="password" name="password" required="">
                      <label>Password</label>
                    </div>

                    <div class="user-box">
                    <input type="password" name="password_conf" required="">
                      <label>Confirm Password</label>
                    </div>
                    
                    <button
                      style="color: white; background-color: black"
                      type="submit"
                      name="create_staff"
                      class="btn btn-primary"
                    >
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      Create Account
                    </button>
                  </form>
                </div>
                <!-- -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
