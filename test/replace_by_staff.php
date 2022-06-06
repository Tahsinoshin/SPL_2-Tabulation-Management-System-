<?php
session_start();

$sucess="";
$error="";
$errorFlag=0;




// include "../signup_login/test_db.php";

if(isset($_POST['replace_by_staff']))
    {
        //include ".././signup_login/test_db.php"; 

      echo "works here";

        

        $target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/blank/";


        $dbHost="localhost";
        $dbName="test_database";
        $dbUserName= "root";
        $dbPassword="";

        $db_conn= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);


        //$slash= "/";

        if($_POST['program'])
        {
            $program= $_POST['program']."/";
            strtolower($program);
            $target.=$program;
        }

        if($_POST['year_sem'])
        {
            $year_sem= $_POST['year_sem']."/";
            strtolower($year_sem);
            $target.=$year_sem;


            if(isset($_POST['year']))
            {
                $year= $_POST['year']."/";
                strtolower($year);
                $target.=$year;
            }
            else if(isset($_POST['semester']))
            {
                $semester= $_POST['semester']."/";
                strtolower($semester);
                $target.=$semester;
            }
        }

        if($_POST['course_type'])
        {
            $course_type= $_POST['course_type']."/";
            strtolower($course_type);
            $target.=$course_type;
        }
        //$target=$target; 


        echo $target;





        


       // $Filename=mysqli_real_escape_string($db_conn,$_POST['Filename']);
       $Filename= $_POST['Filename'];

       echo $Filename;

        $NewfileName = $_FILES['browseFile']['name'];

        
        $tempQuery='SELECT * FROM `filedetails` WHERE filename="'.$Filename.'"';


      
        $temp=mysqli_query($db_conn,$tempQuery);
        
        if(mysqli_num_rows($temp) == 0)
        {
              $errorFlag++;
              $error=$error."file does not exist!";

              echo $error;
              
        }






        else

        {
            
           echo $target; 
        //$target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/";	
        $ex_file= $target.$Filename;	
		$fileTarget = $target.$NewfileName;	
		$tempFileName = $_FILES["browseFile"]["tmp_name"];
		$fileDescription = $_POST['Description'];	


        //delete the old file

        if (unlink($ex_file)) {
            echo 'The file ' . $Filename . ' was deleted successfully!';
        } else {
            echo  $Filename."Doesn't exist such file!" ;
        }


		$result = move_uploaded_file($tempFileName,$fileTarget);
		/*
		*	If file was successfully uploaded in the destination folder
		*/ 

        //echo $fileTarget;

        //echo $tempFileName;
       



		if($result) { 
			//echo "Your file <html><b><i>".$NewfileName."</i></b></html> has been successfully uploaded";		
			$query = "UPDATE filedetails SET filepath='$fileTarget', filename='$NewfileName',description='$fileDescription' where filename='$Filename' ";//VALUES ('$fileTarget','$fileName','$fileDescription')
			$db_conn->query($query) or die("Error : ".mysqli_error($db_conn));
            
            echo "Your file <html><b><i>".$NewfileName."</i></b></html> has been successfully replaced!";
		}
		else {			
			echo "Sorry !!! There was an error in replacing your file";			
		}
		mysqli_close($db_conn);
	}
	/*
	* 	If file is already present in the destination folder
	*/
	// else {
	// 	echo "File <html><b><i>".$fileName."</i></b></html> already exists in your folder. Please rename the file and try again.";
	// 	mysqli_close($db_conn);
            
    //     }
    }
?>
