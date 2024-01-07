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
    <title> FDP / STTP </title>

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
                <h2> FDP / STTP Organised </h2>
            </div>
            
            <div class="card">
                <div class="card-body btn-group">
                
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
				<button type="submit" onclick="exportTableToCSVuser('UserData_FDP_STTP_Attended.csv')" class="btn btn-success">Export to excel</button>
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
                                <th scope="col"> ACADEMIC YEAR </th>
                                <th scope="col"> NAME OF THE TEACHER </th>
                                <th scope="col"> BRANCH </th>
                                <th scope="col"> TITLE OF PROGRAM </th>
                                <th scope="col"> PROFESSIONAL BODY OR ORGANIZATION ASSOCIATED  </th>
                                <th scope="col"> COURSE TYPE</th>
                                <th scope="col"> ORGANIZING INSTITUTE AND LOCATION</th>
                                <th scope="col"> FROM DATE </th>
                                <th scope="col"> END DATE </th>
                                <th scope="col"> DURATION </th>
                                <th scope="col"> TA RECEIVED </th>
                                <th scope="col"> REGISTRATION AMOUNT</th>
                               
                            </tr>
                        </thead>
                        
                        <?php
                        $user = $_SESSION["role"];
                        
                        $result = "SELECT * FROM branchadmins WHERE username = '$user'";

                        $query = mysqli_query($connection, $result);
                        $queryresult = mysqli_num_rows($query); 
                            if($queryresult > 0)
                            {
                                while($row = mysqli_fetch_assoc($query))
                                { 
                                    $id = $row['id'];
                                    $branch = $row['branch'];
                                }  
                            }

                        $table_query = "SELECT * FROM fdpsttpattended WHERE Branch LIKE '%$branch%' ORDER BY id ASC";  
                        $query_run = mysqli_query($connection, $table_query);
                        $query_result = mysqli_num_rows($query_run); ?>

                        <?php if($query_result > 0){
                                        while($developer = mysqli_fetch_assoc($query_run)){   
                                            ?>
                        <tbody> <!-- change -->
                        <tr>
                                <td> <?php echo $developer['id']; ?> </td>
                                <td> <?php echo $developer['Academic_year']; ?> </td> 
                                <td> <?php echo $developer['Name_Of_The_Teacher']; ?> </td> 
                                <td> <?php echo $developer['Branch']; ?> </td>
                                <td> <?php echo $developer['Title_Of_Program']; ?> </td>
                                <td> <?php echo $developer['Professional_Body_Or_Organization_Associated']; ?> </td>
                                <td> <?php echo $developer['Course_Type']; ?> </td>
                                <td> <?php echo $developer['Organizing_Institute_And_Location']; ?> </td>
                                <td> <?php echo $developer['Dates_From']; ?> </td>
                                <td> <?php echo $developer['Dates_To']; ?> </td>
                                <td> <?php echo $developer['Duration']; ?> </td>
                                <td> <?php echo $developer['TA_Received']; ?> </td>
                                <td> <?php echo $developer['Registration_Amount']; ?> </td>

                                <td>

                                    <a href="../../professors/fdp-sttp-attended/uploadsfdpattended1/<?php echo $developer['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>

                                    <a href="../../professors/fdp-sttp-attended/uploadsfdpattended2/<?php echo $developer['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                                    
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
            <th scope="col"> ACADEMIC YEAR </th>
            <th scope="col"> NAME OF THE TEACHER </th>
            <th scope="col"> BRANCH </th>
            <th scope="col"> TITLE OF PROGRAM </th>
            <th scope="col"> PROFESSIONAL BODY OR ORGANIZATION ASSOCIATED  </th>
            <th scope="col"> COURSE TYPE</th>
            <th scope="col"> ORGANIZING INSTITUTE AND LOCATION</th>
            <th scope="col"> FROM DATE </th>
            <th scope="col"> END DATE </th>
            <th scope="col"> DURATION </th>
            <th scope="col"> TA RECEIVED </th>
            <th scope="col"> REGISTRATION AMOUNT</th>
        </tr>
    <thead>  
    <?php 
    if (isset($_POST["submit"])) 
    {
        $str = mysqli_real_escape_string($connection, $_POST["search"]);

        $sth = "SELECT * FROM `fdpsttpattended` WHERE Academic_Year LIKE '%$str%' OR Name_Of_The_Teacher LIKE '%$str%' OR Branch LIKE '%$str%' OR Title_Of_Program LIKE '%$str%' OR Professional_Body_Or_Organization_Associated LIKE '%$str%' OR Course_Type LIKE '%$str%'  OR Organizing_Institute_And_Location LIKE '%$str%' OR Duration LIKE '%$str%' OR TA_Received LIKE '%$str%' OR Registration_Amount LIKE '%$str%' ";
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
                            <td> <?php echo $row['Academic_year']; ?> </td> 
                            <td> <?php echo $row['Name_Of_The_Teacher']; ?> </td> 
                            <td> <?php echo $row['Branch']; ?> </td>
                            <td> <?php echo $row['Title_Of_Program']; ?> </td>
                            <td> <?php echo $row['Professional_Body_Or_Organization_Associated']; ?> </td>
                            <td> <?php echo $row['Course_Type']; ?> </td>
                            <td> <?php echo $row['Organizing_Institute_And_Location']; ?> </td>
                            <td> <?php echo $row['Dates_From']; ?> </td>
                            <td> <?php echo $row['Dates_To']; ?> </td>
                            <td> <?php echo $row['Duration']; ?> </td>
                            <td> <?php echo $row['TA_Received']; ?> </td>
                            <td> <?php echo $row['Registration_Amount']; ?> </td>
                            
                            <td>           
                                <a href="../../iqacadmins/fdp-sttp-attended/uploadsfdpattended1/<?php echo $row['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>

                                <a href="../../iqacadmins/fdp-sttp-attended/uploadsfdpattended2/<?php echo $row['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
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

    <!--<script type="text/javascript">
        function EnableDisableTextBox(Approving_Body) {
            var selectedValue = Approving_Body.options[Approving_Body.selectedIndex].value;
            var txtOther = document.getElementById("txtOther");
            txtOther.disabled = selectedValue == other ? false : true;
            if (!txtOther.disabled) {
                txtOther.focus();
            }
        }
    </script> -->

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
                //chnage this keep same variable as above
                $('#update_id').val(data[0]);
                $('#Academic_year').val(data[1]);
                $('#Name_Of_The_Teacher').val(data[2]);
                $('#Branch').val(data[3]);
                $('#Title_Of_Program').val(data[4]);
                $('#Professional_Body_Or_Organization_Associated').val(data[5]);
                $('#Course_Type').val(data[6]);
                $('#Organizing_Institute_And_Location').val(data[7]);
                $('#Dates_From').val(data[8]);
                $('#Dates_To').val(data[9]);
                $('#Duration').val(data[10]);
                $('#TA_Received').val(data[11]);
                $('#Registration_Amount').val(data[12]);
            });
        });
    </script>

<!--<script>
        function datechecker() {
            if(document.getElementById('insertbutton').clicked == true) {
                alert("Dhjkd");
            }
        }
</script>-->

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