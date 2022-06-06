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

                    

                <form method="post" action="permit_faculty.php " enctype="multipart/form-data">

                    <label> Enter faculty name</label>
                    <input type="text" name="fac_name" required >

                    <label>Enter Faculty Email</label>
                    <input type="email" name="fac_email" required >

                    <label>Enter department name</label>
                    <input type="text" name="department" required >

                    <label>Enter Program Name</label>
                    <input type="text" name="program" required >

                    <p>select year/semester system:</p>
                        <select name="year_sem"  id="year_sem" required>
                            <option value="">---  please select one ---</option>
                            <option value="year"> Year</option>
                            <option value="semester"> Semester</option>

                        </select> 
                        <br>
                        <p id="yearOptions"></p>
                        <script type="text/javascript">
                              $(document).ready(function() {
                              $("#year_sem").change(function() {
                              var opt=$("option:selected").val();
                              if(opt=='year')
                               {
                                 document.getElementById("yearOptions").innerHTML ="<select name='year' ><option>please select a option</option><option>1st</option><option>2nd</option><option>3rd</option><option>4th</option><option>5th Year</option><option>5th</option>select>";
                               }
                               if(opt=='semester')
                               {
                                 document.getElementById("yearOptions").innerHTML ="<select name='semester'><option>please select a option</option><option>1st </option><option>2nd </option><option>3rd </option><option>4th </option><option>5th </option><option>6th </option><option>7th</option><option>8th</option>select>";
                               }
                                                               });
                                                            });
                        </script> 




                        
                    <input TYPE="submit" name="permit_faculty" value="submit">

                    </form>
                        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 