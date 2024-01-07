<?php
session_start();
include('../../config.php');
$user = $_SESSION["role"];
$result = "SELECT * from branchadmins WHERE username = '$user'";
$query = mysqli_query($connection, $result);
$queryresult = mysqli_num_rows($query); 
    if($queryresult > 0){
        while($row = mysqli_fetch_assoc($query)){ 
            $id = $row['id'];
        }  
    }
	
if(isset($_POST['insertdata']))
{
    $Year = $_POST['Year'];
    $Department = $_POST['Department'];
    $Registration_number = $_POST['Registration_number'];
    $Name_of_student= $_POST['Name_of_student'];
    $Name_of_exam = $_POST['Name_of_exam'];
    $other = $_POST['other'];
    $id= $_POST['id'];
	
    move_uploaded_file($file_tmp1,"reports/$pdffile1");

    $query = "INSERT INTO competitiveexams
    (`Year`, `Department`, `Registration_number`, `Name_of_student`, `Name_of_exam`, `other`,  `pdffile1`, `id`,`STATUS`) 
    VALUES ('$Year', '$Department', '$Registration_number', '$Name_of_student', '$Name_of_exam', '$other',  '$pdffile1', '$id','PENDING')";
    
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>