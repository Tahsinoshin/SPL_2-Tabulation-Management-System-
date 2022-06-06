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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<?php
                if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
                ?>

                    <?php 
                        //    $dbHost="localhost";
                        //    $dbName="test_database";
                        //    $dbUserName= "root";
                        //    $dbPassword="";
                           
                        //    $db= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);
                           
                        //    $tempQuery='SELECT * FROM `modified_files` ORDER BY id ASC';
                                
                        //    $list=mysqli_query($db,$tempQuery);
                            
                           
                        // //   While( $row_list=mysqli_fetch_assoc($list)){
                           

                        // //   }

                           
                        //     if(mysqli_num_rows($list) == 0)
                        //        {
                        //            $errorFlag++;
                        //            $error=$error."file does not exist!";
                                  
                        //            echo $error;
                                   
                        //        }
                        
                          
                        ?>

                    <form method="post" action="upload_by_faculty.php " enctype="multipart/form-data">
                        <label>Please enter your email address</label>
                        <input type="email" name="email" required>

                        <label>Please enter the filename you want to upload</label>
                        <input type="text" name="file" required>

                        <label>Select course type</label>

                        <select name="course_type" id="course_type" required>
                            <option value="regular">regular</option>
                            <option value="retake">retake</option>
                        </select>

                        <input type='submit' name='upload_marks' value='submit'>
                        

                        
                    </form>
                        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 