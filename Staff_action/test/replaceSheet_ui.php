<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to Import Excel Data into database in PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <?php
                if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>How to Import Excel Data into database in PHP</h4>
                    </div>
                    <div class="card-body">

                    <form method="post" action="replace_sheet.php " enctype="multipart/form-data">
                    <p>Existing File :</p>
                    <input type="text" name="Filename"> 

                    <p>new File :</p>
                    <input type="file" name="NewFilename"> 

                    <p>Description</p>
                    <textarea rows="10" cols="35" name="Description"></textarea>
                    <br/>
                    <input TYPE="submit" name="replace" value="Submit"/>
               </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 