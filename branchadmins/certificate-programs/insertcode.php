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
    $Course_coordinator = $_POST['Course_coordinator'];
    $Course_coordinator = $_POST['Course_coordinator'];
    $Programs_offered= $_POST['Programs_offered'];
    $Course_code = $_POST['Course_code'];
    $Year_of_offering = $_POST['Year_of_offering'];
    $No_of_times_offered = $_POST['No_of_times_offered'];
    $Start_date = $_POST['Start_date'];
	$End_date = $_POST['End_date'];
    $Duration = $_POST['Duration'];
    $No_of_students_enrolled = $_POST['No_of_students_enrolled'];
    $No_of_students_completing = $_POST['No_of_students_completing'];

    $pdffile1 = $_FILES['pdffile1']['name'];
    $file_tmp1 = $_FILES['pdffile1']['tmp_name'];
    $user_id = $_POST['user_id'];
	
    move_uploaded_file($file_tmp1,"Paper_Details/$pdffile1");

    $query = "INSERT INTO certificates
    (`Department`, `Course_coordinator`, `Programs_offered`, `Course_code`, `Year_of_offering`, `No_of_times_offered`, `Start_date`, `End_date`, `Duration`, `No_of_students_enrolled`, `No_of_students_completing`, `pdffile1`, `user_id`) 
    VALUES ('$Department', '$Course_coordinator', '$Programs_offered', '$Course_code', '$Year_of_offering', '$No_of_times_offered', '$Start_date', '$End_date', '$Duration', '$No_of_students_enrolled', '$No_of_students_completing', '$pdffile1', '$id')";
    
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