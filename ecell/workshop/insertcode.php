<?php
include('../../config.php');
session_start();
$user = $_SESSION["role"];
$result = "SELECT * FROM ecell WHERE username = '$user'";
$query = mysqli_query($connection, $result);
$queryresult = mysqli_num_rows($query); 
    if($queryresult > 0){
        while($row = mysqli_fetch_assoc($query)){ 
            $s_no= $row['s_no'];
        }  
    }
    
if(isset($_POST['insertdata']))
{
    $club = $_POST['club'];
    $Branch = $_POST['Branch'];
    $Title_Of_The_Book_Published= $_POST['Title_Of_The_Book_Published'];
    $Title_Of_The_Chapter_Published_In_The_Book = $_POST['Title_Of_The_Chapter_Published_In_The_Book'];
    $Name_Of_The_Publisher = $_POST['Name_Of_The_Publisher'];
    $National_Or_International = $_POST['National_Or_International'];
    $ISBN_Or_ISSN_Number = $_POST['ISBN_Or_ISSN_Number'];
    $Year_Of_Publication = $_POST['Year_Of_Publication'];
    $Volume_Issue = $_POST['Volume_Issue'];
    $pdffile1 = $_FILES['pdffile1']['name'];
    $file_tmp1 = $_FILES['pdffile1']['tmp_name'];
	$pdffile2 = $_FILES['pdffile2']['name'];
    $file_tmp2 = $_FILES['pdffile2']['tmp_name'];
    $user_id = $_POST['user_id'];

        move_uploaded_file($file_tmp1,"uploadsindexit/$pdffile1");
	    move_uploaded_file($file_tmp2,"uploadsfrontit/$pdffile2");

    $query = "INSERT INTO bookschapter
    (`Name_Of_The_Teacher`, `Branch`, `Title_Of_The_Book_Published`, `Title_Of_The_Chapter_Published_In_The_Book`,
     `Name_Of_The_Publisher`, `National_Or_International`, `ISBN_Or_ISSN_Number`, `Year_Of_Publication`, 
     `Volume_Issue`, `pdffile1`, `pdffile2`, `user_id`) 
    VALUES ('$Name_Of_The_Teacher', '$Branch', '$Title_Of_The_Book_Published', '$Title_Of_The_Chapter_Published_In_The_Book', 
    '$Name_Of_The_Publisher', '$National_Or_International', '$ISBN_Or_ISSN_Number', '$Year_Of_Publication', '$Volume_Issue', '$pdffile1', '$pdffile2', '$id')";
    
    
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