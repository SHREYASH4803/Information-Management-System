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
    <title> Students Internship Details </title>

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
                <h2> Students Internship Details </h2>
                <?php 
if ($_SESSION["role"] == true) {
    echo '<div style="position: absolute; top: 100px; right: 70px; font-weight: bold; color: #007bff;">Welcome ' . $_SESSION["role"] . '<br><span style="color: #008000;">You logged in as Branchadmin</span></div>';
} else {
    header("Location: index.php"); 
}
?>
            </div>
            <div class="card">
                <div class="card-body btn-group">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
				<button type="submit" onclick="exportTableToCSVuser('StudentInternshipDetails.csv')" class="btn btn-success">Export to excel</button>
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
                                <th scope="col">ACADEMIC YEAR </th>
                                <th scope="col"> NAME OF STUDENT</th>
                                <th scope="col"> ROLL NO. </th>
                                <th scope="col"> DEPARTMENT</th>
                                <th scope="col"> DIVISION</th>
                                <th scope="col"> YEAR OF STUDY </th> 
                                <th scope="col"> INTERNSHIP DATE (From)</th>
                                <th scope="col"> INTERNSHIP DATE (To) </th>
                                <th scope="col"> NUMBER OF DAYS OF INTERNSHIP </th>
                                <th scope="col"> NAME OF ORGANIZATION </th>
                                <th scope="col"> ADDRESS OF ORGANIZATION</th>
                                <th scope="col"> ACTION </th>
                               
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


                        $table_query = "SELECT * FROM internship_details WHERE STATUS = 'approved' ORDER BY id ASC";
                        $query_run = mysqli_query($connection, $table_query);
                        $query_result = mysqli_num_rows($query_run); ?>

                        <?php if($query_result > 0){
                                        while($developer = mysqli_fetch_assoc($query_run)){   
                                            ?>
                        <tbody> <!-- change -->
                            <tr>
                            <td> <?php echo $developer['id']; ?> </td>
                                <td> <?php echo $developer['academic_year']; ?> </td>
                                <td> <?php echo $developer['Name_Of_The_Student']; ?> </td>
                                <td> <?php echo $developer['Roll_no']; ?> </td> 
                                <td> <?php echo $developer['Branch']; ?> </td>
                                <td> <?php echo $developer['division']; ?> </td>
                                <td> <?php echo $developer['Year_Of_Study']; ?> </td>
                                <td> <?php echo $developer['Dates_From']; ?> </td>
                                <td> <?php echo $developer['Dates_To']; ?> </td>
                                <td> <?php echo $developer['Number_of_Days_of_Internship']; ?> </td>
                                <td> <?php echo $developer['Name_of_Organization']; ?> </td>
                                <td> <?php echo $developer['Organizing_Addr']; ?> </td>
                                <td>
                            <!--<a href="read.php?viewid=<?php echo htmlentities ($developer['id']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>-->
                            <a href="../../student/student_internship/certificate1/<?php echo $developer['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							<!-- <a href="uploadsfrontit/<?php echo $developer['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a> -->
                            <a href="../../student/student_internship/certificate2//<?php echo $developer['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                            <a href="../../student/student_internship/certificate3/<?php echo $developer['pdffile3']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                            
                            
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
                                <th> ACADEMIC YEAR</th>
                                <th> NAME OF STUDENT </th>
                                <th> ROLL NO.</th>
                                <th> DEPARTMENT</th>
                                <th> DIVISION</th>
                                <th> YEAR OF STUDY </th> 
                                <th> INTERNSHIP DATE (From) </th>
                                <th> INTERNSHIP DATE (To) </th>
                                <th> NUMBER OF DAYS OF INTERNSHIP </th>
                                <th> NAME OF ORGANIZATION</th>
                                <th> ADDRESS OF ORGANIZATION</th>
                            <th> ACTION </th>
                        </tr>
                    <thead>       
<?php 
    if (isset($_POST["submit"])) {
        $str = mysqli_real_escape_string($connection, $_POST["search"]);

        $sth = "SELECT * FROM `internship_details` WHERE user_id= '$id' AND (Branch LIKE '%$str%' OR division LIKE '%$str%' OR Roll_no LIKE '%$str%' OR Name_Of_The_Student LIKE '%$str%' OR Year_Of_Study LIKE '%$str%' OR academic_year LIKE '%$str%' OR Name_Of_Organization LIKE '$str' OR Number_of_Days_of_Internship LIKE '%$str%' OR Organizing_Addr LIKE '%$str%' OR Dates_From LIKE '%$str%' OR Dates_To LIKE '%$str%' OR STATUS LIKE '$str' ) ";
        
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
                        <td> <?php echo $row['academic_year']; ?> </td>
                        <td> <?php echo $row['Name_Of_The_Student']; ?> </td>
                        <td> <?php echo $row['Roll_no']; ?> </td> 
                        <td> <?php echo $row['Branch']; ?> </td>
                        <td> <?php echo $row['division']; ?> </td>
                        <td> <?php echo $row['Year_Of_Study']; ?> </td>
                        <td> <?php echo $row['Dates_From']; ?> </td>
                        <td> <?php echo $row['Dates_To']; ?> </td>
                        <td> <?php echo $row['Number_of_Days_of_Internship']; ?> </td>
                        <td> <?php echo $row['Name_of_Organization']; ?> </td>
                        <td> <?php echo $row['Organizing_Addr']; ?> </td>
                        <td>
                            <!--<a href="read.php?viewid=<?php echo htmlentities ($developer['id']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>-->
                            <a href="../../student/student_internship/certificate1/<?php echo $developer['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							<!-- <a href="uploadsfrontextc/<?php echo $developer['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a> -->
                            <a href="../../student/student_internship/certificate2/<?php echo $row['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                            <a href="../../student/student_internship/certificate3/<?php echo $row['pdffile3']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                            
                            
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
                $('#Name_Of_The_Student').val(data[1]);
                $('#Roll_no').val(data[2]);
                $('#Branch').val(data[3]);
                $('#division').val(data[4]);
                $('#Year_Of_Study').val(data[5]);
                $('#Dates_From').val(data[6]);
                $('#Dates_To').val(data[7]);
                $('#Number_of_Days_of_Internship').val(data[8]);
                $('#Name_of_Organization').val(data[9]);
                $('#Organizing_Addr').val(data[10]);
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
    for (var i = 0; i < rows.length; i++) {
            var row = [];
            var cols = rows[i].querySelectorAll("td, th");
            for (var j = 1; j < cols.length - 1; j++) {
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
            for (var j = 1; j < cols.length - 1; j++) {
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