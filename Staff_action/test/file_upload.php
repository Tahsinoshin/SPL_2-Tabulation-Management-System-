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
                
               <form method="post" action=" " enctype="multipart/form-data">
                    <p>File :</p>
                    <input type="file" name="Filename"> 
                    <p>Description</p>
                    <textarea rows="10" cols="35" name="Description"></textarea>
                    <br/>
                    <input TYPE="submit" name="upload" value="Submit"/>
               </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 


<?php
	$fileExistsFlag = 0; 
	$fileName = $_FILES['Filename']['name'];
	$link = mysqli_connect("localhost","root","","test_database") or die("Error ".mysqli_error($link));
	/* 
	*	Checking whether the file already exists in the destination folder 
	*/
	$query = "SELECT filename FROM filedetails WHERE filename='$fileName'";	
	$result = $link->query($query) or die("Error : ".mysqli_error($link));
	while($row = mysqli_fetch_array($result)) {
		if($row['filename'] == $fileName) {
			$fileExistsFlag = 1;
		}		
	}
	/*
	* 	If file is not present in the destination folder
	*/
	if($fileExistsFlag == 0) { 
		$target = "D:/xampp/htdocs/SPL_2/Staff_action/test/files/";		
		$fileTarget = $target.$fileName;	
		$tempFileName = $_FILES["Filename"]["tmp_name"];
		$fileDescription = $_POST['Description'];	
		$result = move_uploaded_file($tempFileName,$fileTarget);
		/*
		*	If file was successfully uploaded in the destination folder
		*/ 
		if($result) { 
			echo "Your file <html><b><i>".$fileName."</i></b></html> has been successfully uploaded";		
			$query = "INSERT INTO filedetails(filepath,filename,description) VALUES ('$fileTarget','$fileName','$fileDescription')";
			$link->query($query) or die("Error : ".mysqli_error($link));			
		}
		else {			
			echo "Sorry !!! There was an error in uploading your file";			
		}
		mysqli_close($link);
	}
	/*
	* 	If file is already present in the destination folder
	*/
	else {
		echo "File <html><b><i>".$fileName."</i></b></html> already exists in your folder. Please rename the file and try again.";
		mysqli_close($link);
	}	
?>

