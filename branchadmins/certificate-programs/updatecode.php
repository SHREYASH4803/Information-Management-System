<?php
include('../../config.php');
$user = $_SESSION["role"];

$result = "SELECT * FROM credentials WHERE username = '$user'";
$query = mysqli_query($connection, $result);
$queryresult = mysqli_num_rows($query); 
    if($queryresult > 0){
        while($row = mysqli_fetch_assoc($query)){ 
            $id = $row['id'];
        }  
    }

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
       
        $Department = $_POST['Department'];
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
        $pdffile1 = $_FILES['pdffile1']['name1'];
        $file_tmp1 = $_FILES['pdffile1']['tmp_name1'];
		// $pdffile2 = $_FILES['pdffile2']['name2'];
        // $file_tmp2 = $_FILES['pdffile2']['tmp_name2'];

        move_uploaded_file($file_tmp1,"uploadsindexit/$pdffile1");
		// move_uploaded_file($file_tmp2,"uploadsfrontit/$pdffile2");
        
 
            $query = "UPDATE certificates SET Department = '$Department', Course_coordinator = '$Course_coordinator', 
        Programs_offered = '$Programs_offered', Course_code = '$Course_code', Year_of_offering = '$Year_of_offering', 
        No_of_times_offered = '$No_of_times_offered', Start_date = '$Start_date', End_date = '$End_date', 
        Duration = '$Duration',No_of_students_enrolled='$No_of_students_enrolled',
        No_of_students_completing = '$No_of_students_completing' WHERE id='$id'  ";

        $query_run = mysqli_query($connection, $query);
        
        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>