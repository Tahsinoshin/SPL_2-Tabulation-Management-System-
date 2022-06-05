<?php

$sucess="";
$error="";
$errorFlag=0;


// include "../signup_login/test_db.php";

if(isset($_POST['replace_by_staff']))
    {
        //include ".././signup_login/test_db.php"; 

        session_start();

        $target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/blank/";


        $dbHost="localhost";
        $dbName="test_database";
        $dbUserName= "root";
        $dbPassword="";

        $db_conn= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);

        if($_POST['program'])
        {
            $program= $_POST['program']."/";
            $target.=$program;
        }

        if($_POST['year_sem'])
        {
            $year_sem= $_POST['year_sem']."/";
            $target.=$year_sem;


            if(isset($_POST['year']))
            {
                $year= $_POST['year']."/";
                $target.=$year;
            }
            else if(isset($_POST['semester']))
            {
                $semester= $_POST['semester']."/";
                $target.=$semester;
            }
        }

        if($_POST['course_type'])
        {
            $course_type= $_POST['course_type']."/";
            $target.=$course_type;
        }
        $target=$target."/"; 


        echo $target;





        

        if($_POST['Filename'] == ""  )
        
        {
            $errorFlag++;
            $error=$error."You need to provide a valid filename.<br>";

        }



        //echo $_POST['Filename'];

       // $NewFilename= $_POST['NewFilename'];

        // if($_POST['NewFilename'] == ""  )
        
        // {
        //     $errorFlag++;
        //     $error=$error."You need to provide a valid filename.<br>";

        // }

        // if($_POST['Filename'] == $_POST['NewFilename'])
        // {
        //     $errorFlag++;
        //     $error=$error."You need to provide a valid filename.<br>";

        // }


        $Filename=mysqli_real_escape_string($db_conn,$_POST['Filename']);

        $NewfileName = $_FILES['NewFilename']['name'];

        
        $tempQuery='SELECT * FROM `filedetails` WHERE filename="'.$Filename.'"';
      
        $temp=mysqli_query($db_conn,$tempQuery);
        
        if(mysqli_num_rows($temp) == 0)
        {
              $errorFlag++;
              $error=$error."file does not exist!";
              
        }






        if($errorFlag == 0)

        {
            // $query="
            // UPDATE `filedetails`
            // SET filename='$NewFilename'
            // WHERE filename='$Filename';
            
            // ";

            // $result=mysqli_query($db_conn,$query);

            // if($result)
            // {
            //     $sucess=$sucess."The password reset has been successful.<br>";

            //     echo $sucess;
            // }
            
        //$target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/";	
        $ex_file= $target.$Filename;	
		$fileTarget = $target.$NewfileName;	
		$tempFileName = $_FILES["NewFilename"]["tmp_name"];
		$fileDescription = $_POST['Description'];	


        //delete the old file

        if (unlink($ex_file)) {
            echo 'The file ' . $ex_file . ' was deleted successfully!';
        } else {
            echo  $filename."Doesn't exist such file!" ;
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
