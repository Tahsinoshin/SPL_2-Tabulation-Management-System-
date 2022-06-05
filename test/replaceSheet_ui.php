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
                           $dbHost="localhost";
                           $dbName="test_database";
                           $dbUserName= "root";
                           $dbPassword="";
                           
                           $db= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);
                           
                           $tempQuery='SELECT * FROM `filedetails` ORDER BY id ASC';
                                
                           $list=mysqli_query($db,$tempQuery);
                            
                           
                          While( $row_list=mysqli_fetch_assoc($list)){
                           

                          }

                           
                            if(mysqli_num_rows($list) == 0)
                               {
                                   $errorFlag++;
                                   $error=$error."file does not exist!";
                                  
                                   echo $error;
                                   
                               }
                        
                          
                        ?>

<form method="post" action="replace_sheet.php " enctype="multipart/form-data">
                        select year/semester system:
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
                                 document.getElementById("yearOptions").innerHTML ="<select><option>1st Year</option><option>2nd Year</option><option>3rd Year</option><option>4th Year</option><option>5th Year</option><option>5th Year</option>select>";
                               }
                               if(opt=='semester')
                               {
                                 document.getElementById("yearOptions").innerHTML ="<select><option>1st Semester</option><option>2nd Semester</option><option>3rd Semester</option><option>4th Semester</option><option>5th Semester</option><option>6th Semester</option><option>7th Semester</option><option>8th Semester</option>select>";
                               }
                                                               });
                                                            });
                        </script>

Department :  
                        <select  name='dept[]' required >  
                        <option value="">---  please select department ---</option>  
                        
                        
                        <?php 

                            $tempQuery='SELECT DISTINCT department FROM `filedetails` ORDER BY id ASC';
                            $list=mysqli_query($db,$tempQuery);
                        ?> 

                        
                        <?php      
                        while($row_list=mysqli_fetch_assoc($list)){   
                        ?>  
                            
                        <option value="<?php echo $row_list['id']; ?>">  
                        <?php echo $row_list['department'];?>  
                        </option>  
                        <?php
                            }  
                        ?>  
                        </select>

                        <br>
                        Program:
                        <select  name='program[]' required>  
                        <option value="">---  please select a program---</option>  
                        
                        
                        <?php 

                            $tempQuery='SELECT DISTINCT program FROM `filedetails` ORDER BY id ASC';    
                            $list=mysqli_query($db,$tempQuery);
                    
                        ?>  
                        
                        <?php      
                        while($row_list=mysqli_fetch_assoc($list)){ 
                        ?>  
                            
                        <option value="<?php echo $row_list['id']; ?>">  
                        <?php echo $row_list['program'];?>  
                        </option>  
                        <?php
                            }  
                        ?>  
                        </select>

                        <br>
                        Course type:
                        <select  name='course_type[]' required>  
                        <option value="">---  please select course type ---</option>  
                        
                        <?php 

                            $tempQuery='SELECT DISTINCT course_type FROM `filedetails` ORDER BY id ASC';
                            $list=mysqli_query($db,$tempQuery);
         
                        ?>  
                        <?php      
                        while($row_list=mysqli_fetch_assoc($list)){ 
                          
                        ?>  
                        <option value="<?php echo $row_list['id']; ?>">  
                        <?php echo $row_list['course_type'];?>  
                        </option>  
                        
                        <?php
                            }  
                        ?>  
                        </select> 
                        <br>
                        

                    <p>Existing File :</p>
                    <input type="text" name="Filename">
                    <p>new File :</p>
                    <input type="file" name="NewFilename"> 

                    <p>Description</p>
                    <textarea rows="10" cols="35" name="Description"></textarea>
                    <br/>
                    <input TYPE="submit" name="replace" value="Submit"/>

                    </form>
                        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 