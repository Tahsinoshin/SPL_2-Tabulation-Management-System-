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

                    <form method="post" action="modify_marks.php " enctype="multipart/form-data">
                        <label>Please enter your email address</label>
                        <input type="email" name="email" required>

                        <label>Select course type</label>

                        <select name="course_type"  required>
                            <option value="regular">regular</option>
                            <option value="retake">retake</option>
                        </select>

                        <input type='submit' name='modify_marks' value='submit'>
                        

                        
                    </form>
                        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 