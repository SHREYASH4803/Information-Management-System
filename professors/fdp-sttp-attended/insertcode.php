<?php
include('../../config.php');
session_start();

$user = $_SESSION["role"];
$result = "SELECT * FROM credentials WHERE username = '$user'";
$query = mysqli_query($connection, $result);
$queryresult = mysqli_num_rows($query); 
    if($queryresult > 0){
        while($row = mysqli_fetch_assoc($query)){ 
            $id = $row['id'];
        }  
    }
    
if(isset($_POST['insertdata']))
{       
    $Academic_year = $_POST['Academic_year'];
    $Name_Of_The_Teacher=$_POST['Name_Of_The_Teacher'];
    $Branch = $_POST['Branch'];
    $Title_Of_Program = $_POST['Title_Of_Program'];
    $Professional_Body_Or_Organization_Associated = $_POST['Professional_Body_Or_Organization_Associated'];
    $Course_Type= $_POST['Course_Type'];

    $Organizing_Institute_And_Location=$_POST['Organizing_Institute_And_Location'];

    $Dates_From = $_POST['Dates_From'];
    $Dates_To = $_POST['Dates_To'];
    $Duration = $_POST['Duration'];
    $TA_Received = $_POST['TA_Received'];
    $Registration_Amount = $_POST['Registration_Amount'];
    $pdffile1 = $_FILES['pdffile1']['name'];
    $file_tmp1 = $_FILES['pdffile1']['tmp_name'];
	$pdffile2 = $_FILES['pdffile2']['name'];
    $file_tmp2 = $_FILES['pdffile2']['tmp_name'];

    $user_id = $_POST['user_id'];

    move_uploaded_file($file_tmp1,"uploadsfdpattended1/$pdffile1");
    move_uploaded_file($file_tmp2,"uploadsfdpattended2/$pdffile2");

    $query = "INSERT INTO fdpsttpattended
    (`Academic_year`, `Name_Of_The_Teacher`,`Branch`, `Title_Of_Program`, `Professional_Body_Or_Organization_Associated`,`Course_Type`,`Organizing_Institute_And_Location`,`Dates_From`, `Dates_To`, `Duration`, `TA_Received`, `Registration_Amount`, `pdffile1`,`pdffile2`, `user_id`) 
    VALUES ('$Academic_year', '$Name_Of_The_Teacher','$Branch', '$Title_Of_Program', '$Professional_Body_Or_Organization_Associated','$Course_Type', '$Organizing_Institute_And_Location','$Dates_From', '$Dates_To', '$Duration', '$TA_Received', '$Registration_Amount', '$pdffile1','$pdffile2', '$id' )";

    
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