<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin login</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">

</head>

<body>
   <div class="container">
      <img src="DU-logo.svg" height="100" width="200" class="rounded mx-auto d-block" alt="DU logo">
      <div class="row d-flex justify-content-center">
         <div class="col-sm-4 d-flex justify-content-center text-center">
            <div class="admin_form">
               <form action="faculty_acc_update.php" method="POST">
                  <div class="mb-3">
                     <div class="form-group">
                        <label class="label_text">Enter your ID/Username</label>
                        <input type="text" class="form-control" name="id" value="" required="">

                     
                     <div class="form-group">
                        <label class="label_text">Enter new Password</label>
                        <input type="password" class="form-control" name="password" required="">

                     </div>

                     <div class="form-group">
                        <label class="label_text">Confirm new Password</label>
                        <input type="password" class="form-control" name="password_conf" required="">

                     </div>
                     
                  </div>
                  <button type="submit" name="reset_password" class="btn btn-primary">update password</button>

               </form>
            </div>
         </div>
      </div>
   </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</html>