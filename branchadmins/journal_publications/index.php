<?php 
include('../../config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Publications</title>

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

            <div class="card">
                <div class="card-body">
                <?php 
                if($_SESSION["role"] == true) {
                    echo "Welcome". " ".$_SESSION["role"] ;
                } else {
                    header("Location:index.php"); 
                }
                ?>
                </div>
                </div>

            <div class="card-body mt-5">
                <h2> Journal Publications</h2>
            </div>

            <div class="card">
                <div class="card-body btn-group">

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
				<button type="submit" onclick="exportTableToCSVuser('USerData_JournalPublications.csv')" class="btn btn-success">Export to excel</button>
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
                                <th scope="col"> NAME OF FACULTY </th>
                                <th scope="col"> BRANCH </th>
                                <th scope="col"> TITLE OF PAPER </th>
                                <th scope="col"> NAME OF AUTHOR </th>
                                <th scope="col"> NAME OF JOURNAL </th>
                                <th scope="col"> JOURNAL CITATION INDEX </th>
                                <th scope="col"> JOURNAL IMPACT FACTOR </th>
                                <th scope="col"> PUBLISHER </th>
                                <th scope="col"> PUBLICATION YEAR </th>
                                <th scope="col"> PUBLICATION DATE </th>
                                <th scope="col"> VOLUME ISSUE </th>
								<th scope="col"> ISBN/ISSN </th>
                                <th scope="col"> WEBPAPER LINK </th>
                                <th scope="col"> LINK OF PAPER </th>
                                <th scope="col"> DETAILS OF PAPER </th>
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

                        $table_query = "SELECT * FROM journal_publications WHERE branch LIKE '%$branch%' ORDER BY id DESC";
                        
                        $query_run = mysqli_query($connection, $table_query);
                        $query_result = mysqli_num_rows($query_run); ?>

                        <?php if($query_result > 0){
                                        while($developer = mysqli_fetch_assoc($query_run)){   
                                            ?>

                        <tbody> <!-- change -->
                            <tr>
                                <td> <?php echo $developer['id']; ?> </td>
                                <td> <?php echo $developer['Name_Of_Faculty']; ?> </td> 
                                <td> <?php echo trim($developer['Branch']); ?> </td> 
                                <td> <?php echo $developer['Title_Of_Paper']; ?> </td>
                                <td> <?php echo $developer['Name_Of_Author']; ?> </td>
                                <td> <?php echo $developer['Name_Of_Journal']; ?> </td>
                                <td> <?php echo $developer['Journal_Citation_Index']; ?> </td>
                                <td> <?php echo $developer['Journal_Impact_Factor']; ?> </td>
                                <td> <?php echo $developer['Publisher']; ?> </td>
                                <td> <?php echo $developer['Year_Of_Publication']; ?> </td>
                                <td> <?php echo $developer['Publication_Date']; ?> </td>
                                <td> <?php echo $developer['Volume_Issue']; ?> </td>
                                <td> <?php echo $developer['ISSN_ISBN']; ?> </td>
                                <td> <?php echo $developer['Paper_Weblink']; ?> </td>
                                <td> <?php echo $developer['Link_Of_Paper']; ?> </td>
                                <td> <?php echo $developer['Details_Of_Paper']; ?> </td>
                                <td>

                                <a href="../../professors/journal_publications/JournalPaper/<?php echo $developer['Journal_Paper']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                                    </td>
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
                                <th scope="col"> ID </th>
                                <th scope="col"> NAME OF FACULTY </th>
                                <th scope="col"> BRANCH </th>
                                <th scope="col"> TITLE OF PAPER </th>
                                <th scope="col"> NAME OF AUTHOR </th>
                                <th scope="col"> NAME OF JOURNAL </th>
                                <th scope="col"> JOURNAL CITATION INDEX </th>
                                <th scope="col"> JOURNAL IMPACT FACTOR </th>
                                <th scope="col"> PUBLISHER </th>
                                <th scope="col"> PUBLICATION YEAR </th>
                                <th scope="col"> PUBLICATION DATE </th>
                                <th scope="col"> VOLUME ISSUE </th>
								<th scope="col"> ISBN/ISSN </th>
                                <th scope="col"> WEBPAPER LINK </th>
                                <th scope="col"> LINK OF PAPER </th>
                                <th scope="col"> DETAILS OF PAPER </th>
                                <th scope="col"> ACTION </th>
                               
                            </tr>
                    <thead>       
<?php 
    if (isset($_POST["submit"])) {
        $str = mysqli_real_escape_string($connection, $_POST["search"]);

        $sth = "SELECT * FROM `journal_publications` WHERE Branch LIKE '%$branch%' AND (Name_Of_Faculty LIKE '%$str%' OR Title_Of_Paper LIKE '%$str%' OR Name_Of_Author LIKE '%$str%' OR Name_Of_Journal LIKE '%$str%' OR Journal_Citation_Index LIKE '$str' OR Journal_Impact_Factor LIKE '%$str%' OR Publisher LIKE '%$str%' OR Year_Of_Publication LIKE '%$str%' OR Publication_Date LIKE '%$str%' OR Volume_Issue LIKE '$str' OR ISSN_ISBN LIKE '%$str%')";
        
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
                                <td> <?php echo $row['Name_Of_Faculty']; ?> </td> 
                                <td> <?php echo $row['Branch']; ?> </td> 
                                <td> <?php echo $row['Title_Of_Paper']; ?> </td>
                                <td> <?php echo $row['Name_Of_Author']; ?> </td>
                                <td> <?php echo $row['Name_Of_Journal']; ?> </td>
                                <td> <?php echo $row['Journal_Citation_Index']; ?> </td>
                                <td> <?php echo $row['Journal_Impact_Factor']; ?> </td>
                                <td> <?php echo $row['Publisher']; ?> </td>
                                <td> <?php echo $row['Year_Of_Publication']; ?> </td>
                                <td> <?php echo $row['Publication_Date']; ?> </td>
                                <td> <?php echo $row['Volume_Issue']; ?> </td>
                                <td> <?php echo $row['ISSN_ISBN']; ?> </td>
                                <td> <?php echo $row['Paper_Weblink']; ?> </td>
                                <td> <?php echo $row['Link_Of_Paper']; ?> </td>
                                <td> <?php echo $row['Details_Of_Paper']; ?> </td>
                                <td>

                            <a href="../../professors/journal_publications/JournalPaper/<?php echo $row['Journal_Paper']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
				                                                        
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