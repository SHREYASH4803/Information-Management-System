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

        $Name_Of_Faculty = $_POST['Name_Of_Faculty'];
        $Branch = $_POST['Branch'];
        $Title_Of_Paper= $_POST['Title_Of_Paper'];
        $Name_Of_Author = $_POST['Name_Of_Author'];
        $Name_Of_Journal = $_POST['Name_Of_Journal'];
        $Journal_Citation_Index = $_POST['Journal_Citation_Index'];
        $Journal_Impact_Factor = $_POST['Journal_Impact_Factor'];
        $Publisher = $_POST['Publisher'];
        $Year_Of_Publication = $_POST['Year_Of_Publication'];
        $Publication_Date = $_POST['Publication_Date'];
        $Volume_Issue = $_POST['Volume_Issue'];
        $ISSN_ISBN = $_POST['ISSN_ISBN'];
        $Paper_Weblink = $_POST['Paper_Weblink'];
        $Link_Of_Paper = $_POST['Link_Of_Paper'];
        $Details_Of_Paper = $_POST['Details_Of_Paper'];
        $Journal_Paper = $_FILES['Journal_Paper']['name'];
        $image_tmp = $_FILES['Journal_Paper']['tmp_name'];        

        move_uploaded_file($image_tmp,"JournalPaper/$Journal_Paper");

        $query = "UPDATE journal_publications SET Name_Of_Faculty = '$Name_Of_Faculty', Branch = '$Branch',
        Title_Of_Paper = '$Title_Of_Paper', Name_Of_Author = '$Name_Of_Author', Name_Of_Journal = '$Name_Of_Journal', 
        Journal_Citation_Index = '$Journal_Citation_Index', Journal_Impact_Factor = '$Journal_Impact_Factor', 
        Publisher = '$Publisher', Year_Of_Publication = '$Year_Of_Publication', Publication_Date = '$Publication_Date', 
        Volume_Issue = '$Volume_Issue',ISSN_ISBN = '$ISSN_ISBN', Paper_Weblink = '$Paper_Weblink', Link_Of_Paper = '$Link_Of_Paper', 
        Details_Of_Paper = '$Details_Of_Paper' WHERE id='$id'  ";
        
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