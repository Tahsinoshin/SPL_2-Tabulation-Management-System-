<?php

$sucess="";
$error="";
$errorFlag=0;


// include "../signup_login/test_db.php";

if(isset($_POST['replace']))
    {
        //include ".././signup_login/test_db.php"; 

        session_start();

        //$target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/";
        $target= "E:/Computer Science/files/blank/honors/year/1stYear/Regular/";


        $dbHost="localhost";
        $dbName="test_database";
        $dbUserName= "root";
        $dbPassword="";

        $db_conn= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);

        //$getFile= $_FILES["NewFilename"]["tmp_name"];
        

        // if($_POST['oldFile'] == ""  )
        
        // {
        //     $errorFlag++;
        //     $error=$error."You need to provide a valid filename.<br>";

        //}
        //$sem_year=$_POST['sem_year'];
        if(isset($_POST['year']))
        {
            $year=$_POST['year'];
        }
        if(isset($_POST['semester']))
        {
            $semester=$_POST['semester'];
        }
        $department=$_POST['department'];
        $program=$_POST['program'];
        $course_type=$_POST['course_type'];
        $newFile= $_POST['newFile'];
        $oldFile= $_POST['oldFile'];



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




        //$oldFile=mysqli_real_escape_string($db_conn,$_POST['oldFile']);

        // if($_POST['newFile'] == ""  )
        
        // {
        //     $errorFlag++;
        //     $error=$error."You need to provide a valid new filename.<br>";


        // }

        

        
        $tempQuery='SELECT * FROM `filedetails` WHERE filename="'.$oldFile.'"';
      
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


            if (unlink($ex_file)) {
                echo 'The file ' . $oldFile . ' was deleted successfully!';
            } else {
                echo  $oldFile."Doesn't exist such file!" ;
            }
            
        //$target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/";	
        $ex_file= $target.$oldFile;	
		$fileTarget = $target.$newFile;	
		$tempFileName = $_FILES['browseFile']['tmp_name'];
		$fileDescription = $_POST['Description'];	
		$result = move_uploaded_file($tempFileName,$fileTarget);

        //echo $result;
		/*
		*	If file was successfully uploaded in the destination folder
		*/ 

        //echo $fileTarget;

        //echo $tempFileName;
        



		if($result) { 
			//echo "Your file <html><b><i>".$NewfileName."</i></b></html> has been successfully uploaded";		
			// $query = "UPDATE filedetails SET filepath='$fileTarget', filename='$newFile',description='$fileDescription' where filename='$oldFile' && department ='$department' && program ='$program' && year='$year' && semester='$semester' && course_type='$course_type' ";//VALUES ('$fileTarget','$fileName','$fileDescription')
			
            $query = "UPDATE filedetails SET filepath='$fileTarget', filename='$newFile',description='$fileDescription' where filename='$oldFile'  ";//VALUES ('$fileTarget','$fileName','$fileDescription')
            
            $db_conn->query($query) or die("Error : ".mysqli_error($db_conn));
            
            echo "Your file <html><b><i>".$newFile."</i></b></html> has been successfully uploaded";
		}
		else {			
			echo "Sorry !!! There was an error in uploading your file";			
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
