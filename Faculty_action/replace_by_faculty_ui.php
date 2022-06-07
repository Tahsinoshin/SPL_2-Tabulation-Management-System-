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

<form method="post" action="replace_by_faculty.php " enctype="multipart/form-data">
                        select year/semester system:
                        <select name="year_sem"  id="year_sem" required>
                            <option value="">---  please select one ---</option>
                            <option value="year"> year</option>
                            <option value="semester"> semester</option>

                        </select> 
                        <br>
                        <p id="yearOptions"></p>
                        <script type="text/javascript">
                              $(document).ready(function() {
                              $("#year_sem").change(function() {
                              var opt=$("option:selected").val();
                              if(opt=='year')
                               {
                                 document.getElementById("yearOptions").innerHTML ="<select name='year' ><option value='1st'>1st Year</option><option value='2nd'>2nd Year</option><option value='3rd'>3rd Year</option><option value='4th'>4th Year</option><option value='5th'>5th Year</option>select>";
                               }
                               if(opt=='semester')
                               {
                                 document.getElementById("yearOptions").innerHTML ="<select name='semester' id='semester'><option value='1st'>1st Semester</option><option value='2nd'>2nd Semester</option><option value='3rd'>3rd Semester</option><option value='4'>4th Semester</option><option value='5th'>5th Semester</option><option value='6'>6th Semester</option><option value='7'>7th Semester</option><option value='8'>8th Semester</option>select>";
                               }
                                                               });
                                                            });
                        </script>

Department :  
                        <select  name='dept' required >  
                        <option value="">---  please select department ---</option>  
                        
                        
                        <?php 

                            $tempQuery='SELECT DISTINCT department FROM `filedetails` ORDER BY id ASC';
                            $list=mysqli_query($db,$tempQuery);
                        ?> 

                        
                        <?php      
                        while($row_list=mysqli_fetch_assoc($list)){   
                        ?>  
                            
                        <option value="<?php echo $row_list['department']; ?>">  
                        <?php echo $row_list['department'];?>  
                        </option>  
                        <?php
                            }  
                        ?>  
                        </select>

                        <br>
                        Program:
                        <select  name='program' required>  
                        <option value="">---  please select a program---</option>  
                        
                        
                        <?php 

                            $tempQuery='SELECT DISTINCT program FROM `filedetails` ORDER BY id ASC';    
                            $list=mysqli_query($db,$tempQuery);
                    
                        ?>  
                        
                        <?php      
                        while($row_list=mysqli_fetch_assoc($list)){ 
                        ?>  
                            
                        <option value="<?php echo $row_list['program']; ?>">  
                        <?php echo $row_list['program'];?>  
                        </option>  
                        <?php
                            }  
                        ?>  
                        </select>

                        <br>
                        Course type:
                        <select  name='course_type' required>  
                        <option value="">---  please select course type ---</option>  
                        
                        <?php 

                            $tempQuery='SELECT DISTINCT course_type FROM `filedetails` ORDER BY id ASC';
                            $list=mysqli_query($db,$tempQuery);
         
                        ?>  
                        <?php      
                        while($row_list=mysqli_fetch_assoc($list)){ 
                          
                        ?>  
                        <option value="<?php echo $row_list['course_type']; ?>">  
                        <?php echo $row_list['course_type'];?>  
                        </option>  
                        
                        <?php
                            }  
                        ?>  
                        </select> 
                        <br>
                        

                    <p>Enter File name :</p>
                    <input type="text" name="Filename" required>

                    <!-- <p>New file name :</p>
                    <input type="text" name="newFile" required> -->

                    <p> Enter modified File :</p>
                    <input type="file" name="browseFile" required> 

                    <p>Description</p>
                    <textarea rows="10" cols="35" name="Description"></textarea>
                    <br/>
                    <input TYPE="submit" name="replace_by_faculty" value="submit"/>

                    </form>
                        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 