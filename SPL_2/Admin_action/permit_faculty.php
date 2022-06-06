<?php

$sucess="";
$error="";
$errorFlag=0;

if(isset($_POST['permit_faculty']))
{
    // $dbHost="localhost";
    // $dbName="system_database";
    // $dbUserName= "root";
    // $dbPassword="";

    // $db_conn= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);

    $Host="localhost";
    $dName="test_database";
    $dUserName= "root";
    $dPassword="";

    $conn= mysqli_connect($Host,$dUserName,$dPassword, $dName);


    $name=$_POST['fac_name'];
    $email=$_POST['fac_email'];
    echo $email;

    $department=$_POST['department'];
    $program=$_POST['program'];

    if(($_POST['year_sem']))
    {
        if(!empty($_POST['year_sem'])=='year')
        {
            $year=$_POST['year_sem'];

            $year_value=$_POST['year'];

            echo $year;

            echo $year_value;
        }
        else if(!empty($_POST['year_sem'])=='semester')
        {
            $semester=$_POST['year_sem'];

            echo $semester;
        }
    }

    // $file_query= "SELECT * FROM `filedetails` WHERE department='$department' && program='$program' && year='$year' && semester='$semester'"; 

    // $result = mysqli_query($conn, $file_query);

    //     //echo $result['filepath'];

    //     $data = mysqli_fetch_assoc($result); 
    //     $FilePath= $data['filepath'];

    $tempQuery='SELECT * FROM `du_faculty_db` WHERE faculty_email="'.$email.'"';   
    $temp=mysqli_query($conn,$tempQuery);
            
    if(mysqli_num_rows($temp) == 0)
    {
        $errorFlag++;
        $error=$error."Email does not exist!Please enter a valid email address...";
        
    }


    else
    {

        echo "else e jay";
        if(!empty($_POST['year_sem'])=='year')
        {
            $year=$_POST['year_sem'];
            $query1= "UPDATE `filedetails` SET faculty_email='$email' WHERE department='$department' && program='$program' && year='$year_value' "; 

        }
        else if(!empty($_POST['year_sem'])=='semester')
        {
            $semester = $_POST['year_sem'];
            $query1= "UPDATE `filedetails` SET faculty_email='$email' WHERE department='$department' && program='$program' && semester='$semester' "; 

        }

        $result=mysqli_query($conn,$query1);

        if($result)
        {
            echo "updated";
        }
       

        //$conn->query($query1) or die("Error : ".mysqli_error($conn));
            
        echo "the tabulator".$name." has been assigned to enter marks."; 
        //$query2="INSERT INTO modified_files(department, program,year, semester, faculty_email) VALUES($department,$program,$year,$semester,$email)";
		
					
			//echo "Sorry !!! There was an error in assigning your file";			
		
		mysqli_close($conn);
    }


}
?>