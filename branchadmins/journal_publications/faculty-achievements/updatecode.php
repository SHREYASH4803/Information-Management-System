<?php
include('../../config.php');
$user = $_SESSION["role"];

$result = "SELECT * FROM branchadmins WHERE username = '$user'";
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
       
        $Academic_Year = $_POST['Academic_Year'];
    // $Branch = $_POST['Branch']; // Remove this line since we are retrieving the branch information from the database
    $Name_Of_The_Faculty = $_POST['Name_Of_The_Faculty'];
    $Nature_of_Achievement = $_POST['Nature_of_Achievement'];
    $Details_of_Achievement = $_POST['Details_of_Achievement'];
    $pdffile1 = $_FILES['pdffile1']['name'];
    $file_tmp1 = $_FILES['pdffile1']['tmp_name'];
		// $pdffile2 = $_FILES['pdffile2']['name2'];
        // $file_tmp2 = $_FILES['pdffile2']['tmp_name2'];
        // $user_id = $_POST['id'];

        move_uploaded_file($file_tmp1,"../../professors/faculty-achievement/certificates/$pdffile1");
		// move_uploaded_file($file_tmp2,"../../professors/book-chapters/uploadsfrontit/$pdffile2");
        
 
            $query = "UPDATE facultyachievement SET Academic_Year = '$Academic_Year', Name_Of_The_Faculty = '$Name_Of_The_Faculty', 
        Branch = '$Branch', Nature_of_Achievement = '$Nature_of_Achievement', Details_of_Achievement = '$Details_of_Achievement' WHERE id='$id'  ";

        //  $query_check_run = mysqli_query($connection, $query_check);

        //  $data = mysqli_fetch_assoc($query_check_run);
        //  $status = $data['STATUS'];
        //  if($status == 'APPROVED'){
        //      echo '<script> alert("Data has already been approved and cannot be updated."); </script>';
        //      header("Location:index.php");
        //      exit();
        //  }

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