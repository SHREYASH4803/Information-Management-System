<?php 
include('../../config.php');
session_start();
?>

<!DOCTYPE html> 

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Conference Publication </title>

    <link rel="stylesheet" href="styles.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body>

<?php include('../../header.php'); ?>

 <!-- main card -->
 <!-- buttons and search buttoncard -->
            <div class="card">
                <div class="card-body">
                <?php 
                if($_SESSION["role"] == true) {
                    echo "Welcome". " ".$_SESSION["role"] ;
                } else {
                    header("Location:index.php"); 
                }
                ?>

            <div class="card-body mt-5">
                <h2> Conference Publication </h2>
            </div>
            <div class="card">
                <div class="card-body btn-group">

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
				<button type="submit" onclick="exportTableToCSVuser('USerData_ConferencePublication.csv')" class="btn btn-success">Export to excel</button>
			</form> &nbsp; &nbsp; 
        
            <form method="post">
                <label>Search</label>
                <input type="text" name="search">
                <input type="submit" name="submit">
            </form>
            </div>
            </div>

             <!-- table -->
            <div id="tabledataid" class="card">
                <div class="card-body">
                      <!-- th change -->
                    <table id="datatableid" class="table table-bordered table-dark mt-2">
                        <thead>
                            <tr>
                                <th scope="col"> ID </th>
                                <th scope="col"> NAME OF TEACHER </th>
                                <th scope="col"> BRANCH </th>
                                <th scope="col"> TITLE OF PAPER </th>
                                <th scope="col"> TITLE OF THE PROCEEDINGS OF THE CONFERENCE </th>
                                <th scope="col"> NAME OF THE CONFERENCE </th>
                                <th scope="col"> NATIONAL/INTERNATIONAL </th>
                                <th scope="col"> NAME OF ORGANIZING INSTITUTE WITH PLACE </th>
								<th scope="col"> YEAR OF PUBLICATION </th>
                                <th scope="col"> ISBN/ISSN </th>
                                <th scope="col"> AFFILIATING INSTITUTE AT TIME OF PUBLICATION </th>
                                <th scope="col"> NAME OF PUBLISHER </th>
                                <th scope="col"> CONFERENCE DATE(FROM) </th>
                                <th scope="col"> CONFERENCE DATE(TO) </th>
                                <th scope="col"> NAME OF DIGITAL LIBRARY HOSTING THE PAPER(IF ANY) </th>
                                <th scope="col"> PAPER WEBINAR/DOI </th>
                                <th scope="col"> CONFERENCE PROCEEDINGS </th>
                                <th scope="col"> REGISTRATION AMOUNT RECEIVED FROM FCRIT </th>
                                <th scope="col"> TA RECEIVED FROM FRCIT </th>
                                
                                <th scope="col"> ACTION </th>
                               
                            </tr>
                        </thead>
                        
                        <?php
                        $user = $_SESSION["role"];
                        
                        $result = "SELECT * FROM branchadmins WHERE username = '$user'";

                        $query = mysqli_query($connection, $result);
                        $queryresult = mysqli_num_rows($query); 
                            if($queryresult > 0){
                                while($row = mysqli_fetch_assoc($query)){ 
                                    $id = $row['id'];
                                    $branch = trim($row['branch']);
                                }  
                            }

                        $table_query = "SELECT * FROM conferencepublication WHERE branch LIKE '%$branch%' ORDER BY id DESC";
                        
                        $query_run = mysqli_query($connection, $table_query);
                        $query_result = mysqli_num_rows($query_run); ?>

                        <?php if($query_result > 0){
                                        while($developer = mysqli_fetch_assoc($query_run)){   
                                            ?>
                        <tbody> <!-- change -->
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['Name_Of_The_Teacher']; ?> </td> 
                                <td> <?php echo $row['Branch']; ?> </td>
                                <td> <?php echo $row['Title_Of_The_Paper']; ?> </td>
                                <td> <?php echo $row['Title_Of_The_Proceedings']; ?> </td>
                                <td> <?php echo $row['Name_Of_The_Conference']; ?> </td>
                                <td> <?php echo $row['National_Or_International']; ?> </td>
                                <td> <?php echo $row['Name_Of_Organizing_Institute']; ?> </td>
						        <td> <?php echo $row['Year_Of_Publication']; ?> </td>
                                <td> <?php echo $row['ISBN_Or_ISSN_Number']; ?> </td>
                                <td> <?php echo $row['Affiliating_Institute']; ?> </td>
                                <td> <?php echo $row['Name_Of_Publisher']; ?> </td>
                                <td> <?php echo $row['Conference_Date_From']; ?> </td>
                                <td> <?php echo $row['Conference_Date_To']; ?> </td>
                                <td> <?php echo $row['Name_Of_Library']; ?> </td>
                                <td> <?php echo $row['Paper_Webinar']; ?> </td>
                                <td> <?php echo $row['Conference_Proceedings']; ?> </td>
                                <td> <?php echo $row['Registration_Amount']; ?> </td>
                                <td> <?php echo $row['TA_Received']; ?> </td>
                                <td>

                            <a href="../../professors/conference-publications/Paper_Details/<?php echo $row['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							<a href="../../professors/conference-publications/Conference_Paper/<?php echo $row['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                            <a href="../../professors/conference-publications/Conference_Certificate/<?php echo $row['pdffile3']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							<a href="../../professors/conference-publications/Application_Letter/<?php echo $row['pdffile4']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							
                            
                            
                            <!-- <button class="btn"><i class="fa fa-download"></i> Download</button> -->
                        </td>
                                <!-- <td>
                                    <button type="button" class="btn btn-success editbtn"> EDIT </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
                                </td> -->
                            </tr>
                        </tbody>
                        <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
                    </table>
            
        </div> 
    </div>

   
<!--Search data -->
<div id="srch" class="card-body">
                <h4> Search Data </h4>
                    <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> NAME OF TEACHER </th>
                            <th> BRANCH </th>
                            <th> TITLE OF PAPER </th>
                            <th> TITLE OF THE PROCEEDINGS OF THE CONFERENCE </th>
                            <th> NAME OF THE CONFERENCE </th>
                            <th> NATIONAL/INTERNATIONAL </th>
                            <th> NAME OF ORGANIZING INSTITUTE WITH PLACE </th>
					        <th> YEAR OF PUBLICATION </th>
                            <th> ISBN/ISSN </th>
                            <th> AFFILIATING INSTITUTE AT TIME OF PUBLICATION </th>
                            <th> NAME OF PUBLISHER </th>
                            <th> CONFERENCE DATE(FROM) </th>
                            <th> CONFERENCE DATE(TO) </th>
                            <th> NAME OF DIGITAL LIBRARY HOSTING THE PAPER(IF ANY) </th>
                            <th> PAPER WEBINAR/DOI </th>
                            <th> CONFERENCE PROCEEDINGS </th>
                            <th> REGISTRATION AMOUNT RECEIVED FROM FCRIT </th>
                            <th> TA RECEIVED FROM FRCIT </th>
                            <th> ACTION </th>
                        </tr>
                    <thead>       
<?php 
    if (isset($_POST["submit"])) {
        $str = mysqli_real_escape_string($connection, $_POST["search"]);

        $sth = "SELECT * FROM `conferencepublication` WHERE Branch LIKE '%$branch%' AND (Name_Of_The_Teacher LIKE '%$str%' OR Title_Of_The_Paper LIKE '%$str%' OR Title_Of_The_Proceedings LIKE '%$str%' OR  Name_Of_The_Conference LIKE '%$str%' OR National_Or_International LIKE '%$str%' OR Name_Of_Organizing_Institute LIKE '%$str%' OR Year_Of_Publication LIKE '%$str%' OR ISBN_Or_ISSN_Number LIKE '%$str%' OR Affiliating_Institute LIKE '%$str%' OR Name_Of_Publisher LIKE '%$str%' OR Name_Of_Library LIKE '%$str%' OR Paper_Webinar LIKE '%$str%' OR Conference_Proceedings LIKE '%$str%' OR Registration_Amount LIKE '%$str%' OR TA_Received LIKE '%$str%')";
        
        $result = mysqli_query($connection, $sth);
        $queryresult = mysqli_num_rows($result); ?>

                    <div class="card">
                        <div class="card-body btn-group">
                        <div> Results- </div> &nbsp; &nbsp;
                        <button class="btn btn-success" onclick="exportTableToCSV('Search_Data.csv')"> Export Data </button>
                        </div>
                    </div>
                    
                    <?php if($queryresult > 0){
                while($row = mysqli_fetch_assoc($result)){   
                    ?>
                    <tbody id="srch"> 
             
                    <tr>                
                        <td> <?php echo $row['id']; ?> </td>
                        <td> <?php echo $row['Name_Of_The_Teacher']; ?> </td> 
                        <td> <?php echo $row['Branch']; ?> </td>
                        <td> <?php echo $row['Title_Of_The_Paper']; ?> </td>
                        <td> <?php echo $row['Title_Of_The_Proceedings']; ?> </td>
                        <td> <?php echo $row['Name_Of_The_Conference']; ?> </td>
                        <td> <?php echo $row['National_Or_International']; ?> </td>
                        <td> <?php echo $row['Name_Of_Organizing_Institute']; ?> </td>
						<td> <?php echo $row['Year_Of_Publication']; ?> </td>
                        <td> <?php echo $row['ISBN_Or_ISSN_Number']; ?> </td>
                        <td> <?php echo $row['Affiliating_Institute']; ?> </td>
                        <td> <?php echo $row['Name_Of_Publisher']; ?> </td>
                        <td> <?php echo $row['Conference_Date_From']; ?> </td>
                        <td> <?php echo $row['Conference_Date_To']; ?> </td>
                        <td> <?php echo $row['Name_Of_Library']; ?> </td>
                        <td> <?php echo $row['Paper_Webinar']; ?> </td>
                        <td> <?php echo $row['Conference_Proceedings']; ?> </td>
                        <td> <?php echo $row['Registration_Amount']; ?> </td>
                        <td> <?php echo $row['TA_Received']; ?> </td>
                        <td>

                            <a href="../../professors/conference-publications/Paper_Details/<?php echo $developer['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							<a href="../../professors/conference-publications/Conference_Paper/<?php echo $developer['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                            <a href="../../professors/conference-publications/Conference_Certificate/<?php echo $developer['pdffile3']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							<a href="../../professors/conference-publications/Application_Letter/<?php echo $developer['pdffile4']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>

							
                            
                            
                            <!-- <button class="btn"><i class="fa fa-download"></i> Download</button> -->
                        </td>
                    </tr> 
                    <tbody>
                    <?php 
            }

        } else {
            echo "No Results Found";
        }
    }
    ?>
    </table>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>



<script>  
    //user-defined function to download CSV file  
    function downloadCSVuser(csv, filename) {  
        var csvFile;  
        var downloadLink;  

        //define the file type to text/csv  
        csvFile = new Blob([csv], {type: 'text/csv'});  
        downloadLink = document.createElement("a");  
        downloadLink.download = filename;  
        downloadLink.href = window.URL.createObjectURL(csvFile);  
        downloadLink.style.display = "none";  

        document.body.appendChild(downloadLink);  
        downloadLink.click();  
    }  

    //user-defined function to export the data to CSV file format  
    function exportTableToCSVuser(filename) {  
    //declare a JavaScript variable of array type  
    var csv = [];  
    var x=document.getElementById("tabledataid");
    var rows = x.querySelectorAll("table tr");  

    //merge the whole data in tabular form   
    for(var i=0; i<rows.length; i++) {  
        var row = [], cols = rows[i].querySelectorAll("td, th");  
        for( var j=1; j<cols.length-1; j++)  
        row.push(cols[j].innerText);  
        csv.push(row.join(","));  
    }   
    //call the function to download the CSV file  
    downloadCSVuser(csv.join("\n"), filename);  
    }  
</script> 

<script>  
        //user-defined function to download CSV file  
        function downloadCSV(csv, filename) {  
        var csvFile;  
        var downloadLink;  

        //define the file type to text/csv  
        csvFile = new Blob([csv], {type: 'text/csv'});  
        downloadLink = document.createElement("a");  
        downloadLink.download = filename;  
        downloadLink.href = window.URL.createObjectURL(csvFile);  
        downloadLink.style.display = "none";  

        document.body.appendChild(downloadLink);  
        downloadLink.click();  
    }  

    //user-defined function to export the data to CSV file format  
    function exportTableToCSV(filename) {  
    //declare a JavaScript variable of array type  
    var csv = [];  
    var x=document.getElementById("srch");
    var rows = x.querySelectorAll("table tr");  

    //merge the whole data in tabular form   
    for(var i=0; i<rows.length; i++) {  
        var row = [], cols = rows[i].querySelectorAll("td, th");  
        for( var j=1; j<cols.length-1; j++)  
        row.push(cols[j].innerText);  
        csv.push(row.join(","));  
    }   
    //call the function to download the CSV file  
    downloadCSV(csv.join("\n"), filename);  
    }  
</script> 


</body>
</html>