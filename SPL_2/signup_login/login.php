<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <script language="javascript">
        function SelectRedirect() {
            // ON selection of section this function will work
            //alert( document.getElementById('s1').value);

            switch (document.getElementById('account').value) {
                case "admin":
                    window.location = "adminLogin.php";
                    break;

                case "staff":
                    window.location = "staffLogin.php";
                    break;

                case "faculty":
                    window.location = "facultyLogin.php";
                    break;
                    /// Can be extended to other different selections of SubCategory //////
                default:
                    window.location = "../"; // if no selection matches then redirected to home page
                    break;
            } // end of switch 
        }
         
    </script>


</head>

<body>

    <div class="container">
    <img src="DU-logo.svg" height="100" width="200"  class="rounded mx-auto d-block" alt="DU logo">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-4 d-flex justify-content-center">
                 <div class="mb-3 login_form w-100 p-3"> 
                    <label for="account">
                        <h2 style="font-face:'Arial', font-weight:'bold'">Choose Account Type:</h2>
                    </label>
                    <SELECT id="account" NAME="section" onChange="SelectRedirect();">
                        <Option value="">Select account</option>
                        <Option value="admin">Admin</option>
                        <Option value="staff">Staff</option>
                        <Option value="faculty">Faculty</option>

                    </SELECT>
                </div> 
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>