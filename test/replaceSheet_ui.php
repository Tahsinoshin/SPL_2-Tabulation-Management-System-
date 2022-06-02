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

                    <?php 
                           $dbHost="localhost";
                           $dbName="test_database";
                           $dbUserName= "root";
                           $dbPassword="";
                           
                           $db= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);
                           
                           $tempQuery='SELECT * FROM `filedetails` ORDER BY id ASC';
                                
                           $list=mysqli_query($db,$tempQuery);
                           //$list=mysqli_query("select * from filedetails order by id asc");  
                           
                          While( $row_list=mysqli_fetch_assoc($list)){
                            //echo $row_list['department'];

                          }

                           
                            if(mysqli_num_rows($list) == 0)
                               {
                                   $errorFlag++;
                                   $error=$error."file does not exist!";
                                  
                                   echo $error;
                                   
                               }
                        
                          
                        ?>  

                <div class="card">
                    <div class="card-header">
                        <h4>How to Import Excel Data into database in PHP</h4>
                    </div>
                    <div class="card-body">

                    <form method="post" action="replace_sheet.php " enctype="multipart/form-data">

                    Department :  
                        <select  name='dept[]' required >  
                        <option value="">---  please select department ---</option>  
                        
                        
                        <?php 

                            $tempQuery='SELECT DISTINCT department FROM `filedetails` ORDER BY id ASC';
                                
                            $list=mysqli_query($db,$tempQuery);
                            //$list=mysqli_query("select * from filedetails order by id asc");  
                            
                            
                             
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
                            //$list=mysqli_query("select * from filedetails order by id asc");  
                            
                            
                             
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
                        select year/semester system:
                        <select id='year_sem' required>
                            <option value="">---  please select one ---</option>
                            <option value='year'> Year</option>
                            <option value='semester'> Semester</option>
                        </select>
                        
                        <br>
                        Year:
                        <select  name='year[]' id='year' required>  
                        <option value="">---  please select year ---</option>  
                        
                        
                        <?php 

                            $tempQuery='SELECT DISTINCT year FROM `filedetails` ORDER BY id ASC';
                                
                            $list=mysqli_query($db,$tempQuery);
                            //$list=mysqli_query("select * from filedetails order by id asc");  
                            
                            
                             
                                ?>  
                          <?php      
                        while($row_list=mysqli_fetch_assoc($list)){ 
                          
                            ?>  
                            
                                <option value="<?php echo $row_list['id']; ?>">  
                                                    <?php echo $row_list['year'];?>  
                                </option>  
                            <?php
                            }  
                            ?>  
                        </select>  


                        <br>
                        Semester:
                        <select  name='semester[]' id='semester' required>  
                        <option value="">---  please select semester ---</option>  
                        
                        
                        <?php 

                            $tempQuery='SELECT DISTINCT semester FROM `filedetails` ORDER BY id ASC';
                                
                            $list=mysqli_query($db,$tempQuery);
                            //$list=mysqli_query("select * from filedetails order by id asc");  
                            
                            
                             
                                ?>  
                          <?php      
                        while($row_list=mysqli_fetch_assoc($list)){ 
                          
                            ?>  
                            
                                <option value="<?php echo $row_list['id']; ?>">  
                                                    <?php echo $row_list['semester'];?>  
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
                            //$list=mysqli_query("select * from filedetails order by id asc");  
                            
                            
                             
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

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>

$('#cat_user').change(function(){

   if($('#year_sem:selected').text() == "year")
   {
     $('#semester').prop('disabled',true);
     $('#year').prop('disabled',false);
   }
   elseif($('#year_sem:selected').text() == "semester")
   {
       $('#year').prop('disabled', true);
       $('#semester').prop('disabled',false);
   }
//    else
//    {
//      $('#event_name').prop('disabled',true);
//    }
 });

</script>

</body>
</html> 