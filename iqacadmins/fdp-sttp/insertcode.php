<?php
include('../../config.php');
session_start();

if(isset($_POST['insertdata']))
{
    $Academic_year = $_POST['Academic_year'];
    $Branch = $_POST['Branch'];
    $Title_Of_Program = $_POST['Title_Of_Program'];
    $Approving_Body = $_POST['Approving_Body'];
    $Grant_Amount = $_POST['Grant_Amount'];
    $Convener_Of_FDP_STTP = $_POST['Convener_Of_FDP_STTP'];
    $Dates_From = $_POST['Dates_From'];
    $Dates_To = $_POST['Dates_To'];
    $Total_No_Of_Days = $_POST['Total_No_Of_Days'];
    $No_Of_Participants = $_POST['No_Of_Participants'];
    $pdffile = $_FILES['pdffile']['name'];
    $file_tmp = $_FILES['pdffile']['tmp_name'];
    $user_id = $_POST['user_id'];

    move_uploaded_file($file_tmp,"../../professors/fdp-sttp/uploadsfdporganised/$pdffile");

    $query = "INSERT INTO fdpsttporganised
    (`Academic_year`, `Branch`, `Title_Of_Program`, `Approving_Body`, `Grant_Amount`, `Convener_Of_FDP_STTP`,
	`Dates_From`, `Dates_To`, `Total_No_Of_Days`, `No_Of_Participants`, `pdffile`, `user_id`)) 
    VALUES ('$Academic_year', '$Branch', '$Title_Of_Program', '$Approving_Body', '$Grant_Amount', '$Convener_Of_FDP_STTP',
	'$Dates_From', '$Dates_To', '$Total_No_Of_Days', '$No_Of_Participants', '$pdffile', '$id')";

    
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