<?php

$sucess="";
$error="";
$errorFlag=0;


// include "../signup_login/test_db.php"; 

if(isset($_POST['upload_marks']))
    {
        //include ".././signup_login/test_db.php"; 

        session_start();

        //$target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/blank/";
        //$target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/marked/";


        $dbHost="localhost";
        $dbName="test_database";
        $dbUserName= "root";
        $dbPassword="";

        $db_conn= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);

        $email=$_POST["email"];
        $course_type=$_POST["course_type"];
        $input_file= $_POST['file'];

        $revised_file = preg_replace('(\\(.*?\\))', '', $input_file);


        $query= "SELECT * FROM filedetails WHERE faculty_email='$email' and course_type='$course_type'";

        $result= mysqli_query($db_conn,$query);


        $output=mysqli_fetch_assoc($output);

        $filepath= $output['filepath'];
        $filename= $output['filename'];

        $target= str_replace("blank","marked",$filepath);
		$tempFileName = $_FILES[$revised_file]["tmp_name"];
		$fileDescription = $_POST['Description'];	 



        //deleting previous file
        // if (unlink($ex_file)) {
        //     echo 'The file ' . $ex_file . ' was deleted successfully!';
        // } else {
        //     echo  $filename."Doesn't exist such file!" ;
        // }



		$result = move_uploaded_file($tempFileName,$fileTarget);
		/*
		*	If file was successfully uploaded in the destination folder
		*/ 



		if($result) { 
			//echo "Your file <html><b><i>".$NewfileName."</i></b></html> has been successfully uploaded";		
			$query = "UPDATE modified_files SET filepath='$fileTarget', filename='$filename',description='$fileDescription', course_type='$courseType' where faculty_email='$email' ";//VALUES ('$fileTarget','$fileName','$fileDescription')
			$db_conn->query($query) or die("Error : ".mysqli_error($db_conn));
            
            echo "Your file <html><b><i>".$filename."</i></b></html> has been successfully uploaded!";
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
    
?>
