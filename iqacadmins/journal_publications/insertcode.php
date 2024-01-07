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
            $file_tmp = $_FILES['Journal_Paper']['tmp_name'];
            $user_id = $_POST['user_id'];
        
            move_uploaded_file($file_tmp,"../../professors/journal_publications/JournalPaper/$Journal_Paper");

            $query = "INSERT INTO journal_publications
            (`Name_Of_Faculty`, `Branch`, `Title_Of_Paper`, `Name_Of_Author`, `Name_Of_Journal`, `Journal_Citation_Index`, `Journal_Impact_Factor`, `Publisher`, `Year_Of_Publication`, `Publication_Date`, `Volume_Issue`, `ISSN_ISBN`, `Paper_Weblink`, `Link_Of_Paper`, `Details_Of_Paper`, `Journal_Paper`) 
            VALUES ('$Name_Of_Faculty', '$Branch', '$Title_Of_Paper', '$Name_Of_Author', '$Name_Of_Journal', '$Journal_Citation_Index', '$Journal_Impact_Factor', '$Publisher', '$Year_Of_Publication', '$Publication_Date', '$Volume_Issue', '$ISSN_ISBN', '$Paper_Weblink', '$Link_Of_Paper', '$Details_Of_Paper', '$Journal_Paper')";
            
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