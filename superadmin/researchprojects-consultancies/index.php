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
    <title> RESEARCH PROJECTS / CONSULTANCIES</title>

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
                <h2> Reasearch Projects/Consultancies</h2>
            </div>
            <div class="card">
                <div class="card-body btn-group">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
				<button type="submit" onclick="exportTableToCSVuser('USerData_BookChapters.csv')" class="btn btn-success">Export to excel</button>
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
                                <th scope="col"> RESEARCH PROJECT / CONSULTANCY </th>
                                <th scope="col"> NAME OF THE PROJECT/ENDOWNMENTS </th>
                                <th scope="col"> NAME OF THE PRINCIPAL INVESTIGATOR/CO-INVESTIGATOR </th>
                                <th scope="col"> DEPARTMENT OF PRINCIPAL INVESTIGATOR </th>
                                <th scope="col"> YEAR OF AWARD </th>
                                <th scope="col"> AMOUNT SANCTIONED </th>
                                <th scope="col"> DURATION OF THE PROJECT </th>
								<th scope="col"> NAME OF THE FUNDING AGENCY </th>
                                <th scope="col"> FUNDING AGENCY WEBSITE LINK </th>
                                <th scope="col"> TYPE(GOVT./NON-GOVT.) </th>
                                <th scope="col"> UPLOAD THE RELEVANT DOCUMENT </th>
                               
                            </tr>
                        </thead>
                        
                        <?php
                        $user = $_SESSION["role"];
                        
                        $result = "SELECT * FROM superadmin WHERE username = '$user'";

                        $query = mysqli_query($connection, $result);
                        $queryresult = mysqli_num_rows($query); 
                            if($queryresult > 0){
                                while($row = mysqli_fetch_assoc($query)){ 
                                    $id = $row['id'];
                                }  
                            }


                        $table_query = "SELECT * FROM researchprojectconsultancies ORDER BY id ASC";
                        $query_run = mysqli_query($connection, $table_query);
                        $query_result = mysqli_num_rows($query_run); ?>

                        <?php if($query_result > 0){
                                        while($developer = mysqli_fetch_assoc($query_run)){   
                                            ?>
                        <tbody> <!-- change -->
                            <tr>
                                <td> <?php echo $developer['id']; ?> </td> 
                                <td> <?php echo $developer['Type_Research_Project_Consultancy']; ?> </td> 
                                <td> <?php echo $developer['Name_Of_Project_Endownment']; ?> </td> 
                                <td> <?php echo $developer['Name_Of_Principal_Investigator_CoInvestigator']; ?> </td>
                                <td> <?php echo $developer['Department_Of_Principal_Investigator']; ?> </td>
                                <td> <?php echo $developer['Year_Of_Award']; ?> </td>
                                <td> <?php echo $developer['Amount_Sanctioned']; ?> </td>
                                <td> <?php echo $developer['Duration_Of_The_Project']; ?> </td>
                                <td> <?php echo $developer['Name_Of_The_Funding_Agency']; ?> </td>
                                <td> <?php echo $developer['Funding_Agency_Website_Link']; ?> </td>
                                <td> <?php echo $developer['Type_Govt_NonGovt']; ?> </td>
                                <td>
                            <!--<a href="read.php?viewid=<?php echo htmlentities ($developer['id']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>-->
                            <a href="../../ecell/researchprojects/uploadsindex1/<?php echo $developer['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							
							
                            
                            
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
                        <th> RESEARCH PROJECT / CONSULTANCY </th>
                        <th> NAME OF THE PROJECT/ENDOWNMENTS </th>
                        <th> NAME OF THE PRINCIPAL INVESTIGATOR/CO-INVESTIGATOR </th>
                        <th> DEPARTMENT OF PRINCIPAL INVESTIGATOR </th>
                        <th> YEAR OF AWARD </th>
                        <th> AMOUNT SANCTIONED </th>
                        <th> DURATION OF THE PROJECT </th>
						<th> NAME OF THE FUNDING AGENCY </th>
                        <th> FUNDING AGENCY WEBSITE LINK </th>
                        <th> TYPE(GOVT./NON-GOVT.) </th>
                        <th> UPLOAD THE RELEVANT DOCUMENT </th>
                        </tr>
                    <thead>       
<?php 
    if (isset($_POST["submit"])) {
        $str = mysqli_real_escape_string($connection, $_POST["search"]);

        $sth = "SELECT * FROM `researchprojectconsultancies` WHERE (id LIKE '%$str%' OR Type_Research_Project_Consultancy LIKE '%$str%' OR Name_Of_Project_Endownment LIKE '%$str%' OR Name_Of_Principal_Investigator_CoInvestigator LIKE '%$str%' OR Department_Of_Principal_Investigator LIKE '%$str%' OR Year_Of_Award LIKE '%$str%' OR Amount_Sanctioned LIKE '%$str%' OR Duration_Of_The_Project LIKE '%$str%' OR Name_Of_The_Funding_Agency LIKE '%$str%' OR Funding_Agency_Website_Link LIKE '%$str%' OR Type_Govt_NonGovt LIKE '%$str%')";
        
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
                        <td> <?php echo $row['Type_Research_Project_Consultancy']; ?> </td> 
                        <td> <?php echo $row['Name_Of_Project_Endownment']; ?> </td> 
                        <td> <?php echo $row['Name_Of_Principal_Investigator_CoInvestigator']; ?> </td>
                        <td> <?php echo $row['Department_Of_Principal_Investigator']; ?> </td>
                        <td> <?php echo $row['Year_Of_Award']; ?> </td>
                        <td> <?php echo $row['Amount_Sanctioned']; ?> </td>
                        <td> <?php echo $row['Duration_Of_The_Project']; ?> </td>
                        <td> <?php echo $row['Name_Of_The_Funding_Agency']; ?> </td>
                        <td> <?php echo $row['Funding_Agency_Website_Link']; ?> </td>
                        <td> <?php echo $row['Type_Govt_NonGovt']; ?> </td>
                        
                        <td>
                            <!--<a href="read.php?viewid=<?php echo htmlentities ($developer['id']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>-->
                            <a href="../../ecell/researchprojects/uploadsindex2/<?php echo $developer['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							
                            
                            
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
                $('#Type_Research_Project_Consultancy').val(data[1]);
                $('#Name_Of_Project_Endownment').val(data[2]);
                $('#Name_Of_Principal_Investigator_CoInvestigator').val(data[3]);
                $('#Department_Of_Principal_Investigator').val(data[4]);
                $('#Year_Of_Award').val(data[5]);
                $('#Amount_Sanctioned').val(data[6]);
                $('#Duration_Of_The_Project').val(data[7]);
                $('#Name_Of_The_Funding_Agency').val(data[8]);
                $('#Funding_Agency_Website_Link').val(data[9]);
                $('#Type_Govt_NonGovt').val(data[10]);
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