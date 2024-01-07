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
    <title> Financial Support Provided </title>

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
             

            <div class="card-body mt-5">
                <h2> Financial Support </h2>
            </div>

            <?php 
if ($_SESSION["role"] == true) {
    echo '<div style="position: absolute; top: 100px; right: 70px; font-weight: bold; color: #007bff;">Welcome ' . $_SESSION["role"] . '<br><span style="color: #008000;">You logged in as Superadmin</span></div>';
} else {
    header("Location: index.php"); 
}
?>
            <div class="card">
                <div class="card-body btn-group">

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
				<button type="submit" onclick="exportTableToCSVuser('USerData_FinancialSupportProvided.csv')" class="btn btn-success">Export to excel</button>
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
                    <th scope="col"> BRANCH </th>
                    <th scope="col"> NAME OF TEACHER </th>
                    <th scope="col"> TITLE OF THE PROGRAM </th>
                    <th scope="col"> ACTIVITY FOR WHICH FINANCIAL SUPPORT WAS PROVIDED </th>
                    <th scope="col"> OTHERS </th>
                    <th scope="col"> DATE (FROM) </th>
                    <th scope="col"> DATE (TO) </th>
                    <th scope="col"> NAME OF THE ACTIVITY </th>
                    <th scope="col"> AMOUNT OF SUPPORT </th>
                    <th scope="col"> ACTION </th>
                    <th scope="col"> STATUS</th>
                </tr>
            </thead>
            <?php
            $user = $_SESSION["role"];

            $result = "SELECT * FROM superadmin WHERE username = '$user'";

            $query = mysqli_query($connection, $result);
            $queryresult = mysqli_num_rows($query);
            if ($queryresult > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $id = $row['id'];
                    
                }
            }

            $table_query = "SELECT * FROM financial_support WHERE STATUS = 'approved' ORDER BY id ASC";

            $query_run = mysqli_query($connection, $table_query);
            $query_result = mysqli_num_rows($query_run); ?>

            <?php if ($query_result > 0) {
                while ($developer = mysqli_fetch_assoc($query_run)) {
                    ?>
                    <tbody> <!-- change -->
                        <tr>
                            <td> <?php echo $developer['id']; ?> </td>
                            <td> <?php echo $developer['Academic_Year']; ?> </td>
                            <td> <?php echo $developer['Branch']; ?> </td>
                            <td> <?php echo $developer['Name_Of_The_Teacher']; ?> </td>
                            <td> <?php echo $developer['Title_Of_Program']; ?> </td>
                            <td> <?php echo $developer['Activity_Name']; ?> </td>
                            <td> <?php echo $developer['Other_Activity']; ?> </td>
                            <td> <?php echo $developer['Dates_From']; ?> </td>
                            <td> <?php echo $developer['Dates_To']; ?> </td>
                            <td> <?php echo $developer['Name_Of_Activity']; ?> </td>
                            <td> <?php echo $developer['Amount_Of_Support']; ?> </td>
                            <td>
                                <a href="../../professors/financial_support/documents/<?php echo $developer['pdffile1']; ?>" class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                                <!-- <a href="../../professors/book-chapters/uploadsfrontit/<?php echo $developer['pdffile2']; ?>" class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a> -->

                                
                            </td>
                           <td> <?php echo $developer['STATUS']; ?> </td>
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


      <!-- DELETE POP UP FORM  -->
    <!-- dont make changes-->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes, Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- EDIT POP UP FORM  -->
    <!-- this is edit data form Make changes to variables and placeholder, keep same variables -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Data </h5> &nbsp;
                    <h5 class="modal-title" id="exampleModalLabel"> (Please enter the dates again)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> Academic Year </label>
                            <input type="text"  id="Year_Of_Publication" name="Year_Of_Publication" class="form-control" required>
                        </div>
                        <div class="form-group">
    <label>Branch</label>
    <select name="Branch" class="form-control" required >
        <option value="">--Select Department--</option>
        <?php
        // Retrieve the department information from the session or any other method
        $branch = $_SESSION['branch']; 

       $branches = array("IT", "EXTC", "Mechanical", "Computers", "Electrical", "Humanities");
foreach ($branches as $branchOption) {
    $selected = ($branchOption == $branch) ? 'selected="selected"' : '';
    echo '<option value="' . $branchOption . '" ' . $selected . '>' . $branchOption . '</option>';
}

        ?>
    </select>
</div>


                        <div class="form-group">
                            <label> Name of the Teacher </label>
                            <input type="text" name="Name_Of_The_Teacher" id="Name_Of_The_Teacher" class="form-control" placeholder="Name of the teacher" required>
                        </div>

                        <div class="form-group">
                            <label> Title of the Program </label>
                            <input type="text"  id="Title_Of_Program" name="Title_Of_Program" class="form-control" placeholder="Enter Title" required>
                        </div>

                        <div class="form-group">
                            <label> Select Activity for which Financial Support was provided  </label>
                            <input type="text" name="Activity_Name"  id="Activity_Name" class="form-control" placeholder="Enter Activity">
                        </div>

                        <div class="form-group">
                            <label> Others </label>
                            <input type="text" name="Other_Activity" id="Other_Activity" class="form-control" placeholder="Enter Name of Activity" required>
                        </div>

                        <div class="form-group">
                            <label> Date (From) </label>
                            <input type="date" name="Dates_From" class="form-control" placeholder="Enter Start Date" max="<?php echo date('Y-m-d'); ?>" required>
                        </div>

                        <div class="form-group">
                            <label> Date (To) </label>
                            <input type="date"  name="Dates_To" class="form-control" placeholder="Enter Ending Date" max="<?php echo date('Y-m-d'); ?>" required>
                        </div>

                        <div class="form-group">
                            <label> Enter Name of the Activity </label>
                            <input type="text" name="Name_Of_Activity" id="Name_Of_Activity" class="form-control" placeholder="Enter Name" required>
                        </div>

                        <div class="form-group">
                            <label> Enter Amount of Support </label>
                            <input type="text" name="Amount_Of_Support" id="Amount_Of_Support" class="form-control" placeholder="Enter Amount" required>
                        </div>
                        
						

                            

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
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
                                <th scope="col"> BRANCH </th> 
                                <th scope="col"> NAME OF TEACHER </th>
                                <th scope="col"> TITLE OF THE PROGRAM </th>
                                <th scope="col"> ACTIVITY FOR WHICH FINANCIAL SUPPORT WAS PROVIDED </th>
                                <th scope="col"> OTHERS </th>
                                <th scope="col"> DATE (FROM) </th>
								<th scope="col"> DATE (TO) </th>
                                <th scope="col"> NAME OF THE ACTIVITY </th>
                                <th scope="col"> AMOUNT OF SUPPORT </th>
                                <th scope="col"> ACTION </th>
                                <th scope="col"> STATUS </th>
                               

                               
                            </tr>
                        </thead>   
<?php 
    if (isset($_POST["submit"])) {
        $str = mysqli_real_escape_string($connection, $_POST["search"]);

        $sth = "SELECT * FROM `financial_support` WHERE STATUS='approved'AND (Academic_Year LIKE '%$str%' OR Name_Of_The_Teacher LIKE '%$str%' OR Title_Of_Program LIKE '%$str%' OR Activity_Name LIKE '%$str%' OR Other_Activity LIKE '$str' OR Dates_From LIKE '%$str%' OR Dates_To LIKE '%$str%' OR Name_Of_Activity LIKE '%$str%' OR Amount_Of_Support LIKE '%$str%' OR STATUS LIKE '$str')";
        
        $result = mysqli_query($connection, $sth);
        $queryresult = mysqli_num_rows($result); ?>

                    <div class="card">
                        <div class="card-body btn-group">
                        <div> Results- </div> &nbsp; &nbsp;
                        <button class="btn btn-success" onclick="exportTableToCSV('Search_Data_FinancialSupport.csv')"> Export Data </button>
                        </div>
                    </div>
                    
                    <?php if($queryresult > 0){
                while($row = mysqli_fetch_assoc($result)){   
                    ?>
                    <tbody id="srch"> 
             
                    <tr>                
                        <td> <?php echo $row['id']; ?> </td>
                        <td> <?php echo $row['Academic_Year']; ?> </td> 
                        <td> <?php echo $row['Branch']; ?> </td>
                        <td> <?php echo $row['Name_Of_The_Teacher']; ?> </td>
                        <td> <?php echo $row['Title_Of_Program']; ?> </td>
                        <td> <?php echo $row['Activity_Name']; ?> </td>
                        <td> <?php echo $row['Other_Activity']; ?> </td>
                        <td> <?php echo $row['Dates_From']; ?> </td>
                        <td> <?php echo $row['Dates_To']; ?> </td>
                        <td> <?php echo $row['Name_Of_Activity']; ?> </td>
                        <td> <?php echo $row['Amount_Of_Support']; ?> </td>
                        <td>

                            <a href="../../professors/financial_support/documents/<?php echo $row['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							<!-- <a href="../../professors/book-chapters/uploadsfrontit/<?php echo $row['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a> -->
                            <td> <?php echo $row['STATUS']; ?> </td>
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
                $('#Academic_Year').val(data[1]);
                $('#Branch').val(data[2]);
                $('#Name_Of_The_Teacher').val(data[3]);
                $('#Activity_Name').val(data[4]);
                $('#Other_Activity').val(data[5]);
                $('#Dates_From').val(data[6]);
                $('#Dates_To').val(data[7]);
                $('#Name_Of_Activity').val(data[8]);
                $('#Amount_Of_Support').val(data[9]);
                $('#pdffile1').val(data[10]);
            });
        });
    </script>
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
    for (var i = 0; i < rows.length; i++) {  
    var row = [];
    var cols = rows[i].querySelectorAll("td, th");  
    for (var j = 1; j < cols.length - 2; j++) {
        // Check if the cell value contains a comma, if so, wrap it in double quotes
        var cellValue = cols[j].innerText;
        if (cellValue.includes(',')) {
            row.push('"' + cellValue + '"');
        } else {
            row.push(cellValue);
        }
    }
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
    for (var i = 0; i < rows.length; i++) {  
    var row = [];
    var cols = rows[i].querySelectorAll("td, th");  
    for (var j = 1; j < cols.length - 2; j++) {
        // Check if the cell value contains a comma, if so, wrap it in double quotes
        var cellValue = cols[j].innerText;
        if (cellValue.includes(',')) {
            row.push('"' + cellValue + '"');
        } else {
            row.push(cellValue);
        }
    }
    csv.push(row.join(","));
}
    //call the function to download the CSV file  
    downloadCSV(csv.join("\n"), filename);  
    }  
</script> 


</body>
</html>