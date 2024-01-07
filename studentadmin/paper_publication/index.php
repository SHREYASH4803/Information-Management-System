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
    <title> Student Paper Publication </title>

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
                <h2> Student Paper Publication</h2>
            </div>
            <?php 
                if($_SESSION["role"] == true) {
                    echo "Welcome". " ".$_SESSION["role"] ;
                } else {
                    header("Location:index.php"); 
                }
                ?>
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
                <th scope="col"> ID</th>
                                <th scope="col"> ACADEMIC YEAR </th>
                                <th scope="col"> NAME OF STUDENT </th>
                                <th scope="col"> ROLL NO </th>
                                <th scope="col"> BRANCH </th>
                                <th scope="col"> DIVISION </th>
                                <th scope="col"> YEAR OF STUDY </th>
                                <th scope="col"> TITLE OF PAPER </th>
                                <th scope="col"> NAME OF CONFERENCE/JOURNAL </th>
                                <th scope="col"> NATIONAL/INTERNATIONAL </th>
								<th scope="col"> YEAR OF PUBLICATION </th>
                                <th scope="col"> ISBN/ISSN NO</th>
                                <th scope="col"> NAME OF PUBLISHER </th>
                                <th scope="col"> INDEXING </th>
                                <th scope="col"> OTHER</th>
                                <th scope="col"> PAPER WEBLINK/DOI </th>
                                <th scope="col"> ACTION</th>
                                <th scope="col"> STATUS </th>
                               
                </tr>
            </thead>
            <?php
            $user = $_SESSION["role"];

            $result = "SELECT * FROM studentadmins WHERE username = '$user'";

            $query = mysqli_query($connection, $result);
            $queryresult = mysqli_num_rows($query);
            if ($queryresult > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $id = $row['id'];
                    $branch = trim($row['branch']);
                    $Year_Of_Study = trim($row['Year_Of_Study']);
                    $division = trim($row['division']);
                }
            }

            $table_query = "SELECT * FROM paper_publication WHERE branch = '$branch' AND Year_Of_Study = '$Year_Of_Study' AND division = '$division' ORDER BY id ASC";

            $query_run = mysqli_query($connection, $table_query);
            $query_result = mysqli_num_rows($query_run); ?>

            <?php if ($query_result > 0) {
                while ($developer = mysqli_fetch_assoc($query_run)) {
                    ?>
                    <tbody> <!-- change -->
                        <tr>
                        <td> <td> <?php echo $developer['id']; ?> </td>
                                <td> <?php echo $developer['academic_year']; ?> </td> 
                                <td> <?php echo $developer['name_of_the_student']; ?> </td>
                                <td> <?php echo $developer['roll_number']; ?> </td>
                                <td> <?php echo $developer['Branch']; ?> </td>
                                <td> <?php echo $developer['division']; ?> </td>
                                <td> <?php echo $developer['Year_Of_Study']; ?> </td>
                                <td> <?php echo $developer['title_of_the_paper']; ?> </td>
                                <td> <?php echo $developer['name_of_the_conference']; ?> </td>
                                <td> <?php echo $developer['national_or_international']; ?> </td>
								<td> <?php echo $developer['year_of_publication']; ?> </td>
                                <td> <?php echo $developer['ISBN_Or_ISSN_Number']; ?> </td>
                                <td> <?php echo $developer['name_of_publisher']; ?> </td>
                                <td> <?php echo $developer['indexing']; ?> </td>
                                <td> <?php echo $developer['other']; ?> </td>
                                <td><a href="<?php echo $developer['paper_link']; ?>" target="_blank"><?php echo $developer['paper_link']; ?></a></td>
                            <td>
                            <a href="../../student/paper_publication/IEEE_paper_format/<?php echo $developer['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							<a href="../../student/paper_publication/certificate/<?php echo $developer['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                            <a href="../../student/paper_publication/conference_paper/<?php echo $developer['pdffile3']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                                <a class="edit btn-success editbtn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a class="delete btn-danger deletebtn" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </td>
                            <td>
                            <?php if ($developer['STATUS'] == 'PENDING') { ?>
                                    <form method="POST" action="approved.php">
                                        <input type="hidden" name="id" value="<?php echo $developer['id']; ?>">
                                        <input type="submit" name="approve" value="Approve">
                                    </form>
                                    <form method="post" action="reject.php">
                                        <input type="hidden" name="id" value="<?php echo $developer['id']; ?>">
                                        <button type="submit" name="reject" class="btn btn-danger">Send Back</button>
                                    </form>
                                <?php } elseif ($developer['STATUS'] == 'Sent Back') { ?>
                                    <?php echo $developer['STATUS']; ?>
                                    <form method="POST" action="approve-now.php">
                                        <input type="hidden" name="id" value="<?php echo $developer['id']; ?>">
                                        <input type="submit" name="approve_now" value="Approve Now">
                                    </form>
                                <?php } else { ?>
                                    <?php echo $developer['STATUS']; ?>
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
            } else {
                echo "No Record Found";
            }
            ?>
        </table>

        <?php
        // Approve button logic
        if (isset($_POST['approve'])) {
            $id = $_POST['id'];
            $select = "UPDATE paper_publication SET STATUS ='APPROVED' WHERE id='$id'";
            $result = mysqli_query($connection, $select);
            echo "Data Approved";
            header("Location: index.php");
        }

        // Reject button logic
        if (isset($_POST['reject'])) {
            $id = $_POST['id'];
            $select = "UPDATE paper_publication SET STATUS ='Sent Back' WHERE id='$id'";
            $result = mysqli_query($connection, $select);
            echo "Data Rejected";
            header("Location: index.php");
        }

        // Approve Now button logic
if (isset($_POST['approve_now'])) {
    $id = $_POST['id'];
    $select = "UPDATE paper_publication SET STATUS ='APPROVED' WHERE id='$id'";
    $result = mysqli_query($connection, $select);
    echo "Data Approved";
    header("Location: index.php");
}
        ?>
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
                            <label>Academic Year*</label>
                            <select name="academic_year" class="form-control" required>
                                <option value="academic_year">--Select Year--</option>
                                <option name="academic_year" value="2022-2023">2022-2023</option>
                                <option name="academic_year" value="2021-2022">2021-2022</option>
                                <option name="academic_year" value="2020-2021">2020-2021</option>
                                <option name="academic_year" value="2019-2020">2019-2020</option>
                                <option name="academic_year" value="2018-2019">2018-2019</option>
                                </select>
                        </div>
                        
                        <div class="form-group">
                            <label> Name of the Student* </label>
                            <input type="text" id="name_of_the_student" name="name_of_the_student" class="form-control" placeholder="Name of the student" required>
                        </div>

                        <div class="form-group">
                            <label> Roll number*</label>
                            <input type="number" id="roll_number" name="roll_number" class="form-control" placeholder="Enter roll number" required>
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
    <label>Division</label>
    <select name="division" class="form-control" required >
        <option value="">--Select Division--</option>
        <?php
        // Retrieve the division information from the session or any other method
        $division = $_SESSION['division'];

        $divisions = array("A", "B", "C");
        foreach ($divisions as $divisionOption) {
            $selected = ($divisionOption == $division) ? 'selected="selected"' : '';
            echo '<option value="' . $divisionOption . '" ' . $selected . '>' . $divisionOption . '</option>';
        }
        ?>
    </select>
</div>

                        <div class="form-group">
                            <label>Year of Study*</label>
                            <select name="Year_Of_Study" class="form-control" required>
                                <option value="Year_Of_Study">--Select--</option>
                                <option name="Year_Of_Study" value="FE">FE</option>
                                <option name="Year_Of_Study" value="SE">SE</option>
                                <option name="Year_Of_Study" value="TE">TE</option>
                                <option name="Year_Of_Study" value="BE">BE</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label> Title of the Paper* </label>
                            <input type="text" id="title_of_the_paper" name="title_of_the_paper" class="form-control" placeholder="title of publisher" required>
                        </div>
                        <div class="form-group">
                            <label> Name of the Conference/Journal*</label>
                            <input type="text" id="name_of_the_conference" name="name_of_the_conference" class="form-control" placeholder="Enter name of conference/journal" required>
                        </div>

                        <div class="form-group">
                            <label> National/International* </label>
                            <input id='national_or_international' type="text" name="national_or_international" class="form-control" placeholder="Enter National or International" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Year of Publication* </label>
                            <input type="text" name="year_of_publication" id="year_of_publication" class="form-control" placeholder="Enter year of Publication" required>
                        </div>


                        <div class="form-group">
                            <label> Enter ISBN/ISSN number </label>
                            <input type="text" id="ISBN_Or_ISSN_Number" name="ISBN_Or_ISSN_Number" class="form-control" placeholder="Enter ISBN/ISSN number" required>
                        </div>

                        <div class="form-group">
                            <label> Name of the Publisher*</label>
                            <input type="text" id="name_of_publisher" name="name_of_publisher" class="form-control" placeholder="Enter name of publisher" required>
                        </div>


                        <div class="form-group">
                            <label> Indexing*</label>
                            <input type="text" name="indexing"  id="indexing" class="form-control" placeholder="Enter indexing" required>
                        </div>

                        <div class="form-group">
                            <label> Paper Webinar/DOI </label>
                            <input type="text" id="paper_link" name="paper_link" class="form-control" placeholder="Paper Webinar/DOI">
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
                            <th scope="col"> Id</th>
                                <th scope="col"> ACADEMIC YEAR </th>
                                <th scope="col"> NAME OF STUDENT </th>
                                <th scope="col"> ROLL NO </th>
                                <th scope="col"> BRANCH </th>
                                <th scope="col"> DIVISION </th>
                                <th scope="col"> YEAR OF STUDY </th>
                                <th scope="col"> TITLE OF PAPER </th>
                                <th scope="col"> NAME OF CONFERENCE/JOURNAL </th>
                                <th scope="col"> NATIONAL/INTERNATIONAL </th>
								<th scope="col"> YEAR OF PUBLICATION </th>
                                <th scope="col"> ISBN/ISSN NO</th>
                                <th scope="col"> NAME OF PUBLISHER </th>
                                <th scope="col"> INDEXING </th>
                                <th scope="col"> OTHER</th>
                                <th scope="col"> PAPER WEBLINK/DOI </th>
                                <th scope="col"> ACTION</th>
                                <th scope="col"> STATUS </th>
                               

                               
                            </tr>
                        </thead>   
<?php 
    if (isset($_POST["submit"])) {
        $str = mysqli_real_escape_string($connection, $_POST["search"]);

        $sth = "SELECT * FROM `paper_publication` WHERE branch='$branch' AND division = '$division'  AND (division LIKE '%$str%' OR academic_year LIKE '%$str%' OR name_of_the_student LIKE '%$str%' OR roll_number LIKE '%$str%' OR Branch LIKE '%$str%' OR  Year_Of_Study LIKE '%$str%' OR title_of_the_paper LIKE '%$str%' OR name_of_the_conference LIKE '%$str%' OR year_of_publication LIKE '%$str%' OR ISBN_Or_ISSN_Number LIKE '%$str%' OR national_or_international LIKE '%$str%' OR indexing LIKE '%$str%' OR name_of_publisher LIKE '%$str%' OR paper_link LIKE '%$str%' OR other LIKE '%$str%')";
        
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
                    <?php
                $status = $row['STATUS'];
                $is_disabled = ($status == "approved") ? "disabled" : "";
                // If STATUS is "approved", set the $is_disabled variable to "disabled"
                ?>      
                   <td> <?php echo $row['id']; ?> </td>
                        <td> <?php echo $row['academic_year']; ?> </td> 
                        <td> <?php echo $row['name_of_the_student']; ?> </td>
                        <td> <?php echo $row['roll_number']; ?> </td>
                        <td> <?php echo $row['Branch']; ?> </td>
                        <td> <?php echo $row['division']; ?> </td>
                        <td> <?php echo $row['Year_Of_Study']; ?> </td>
                        <td> <?php echo $row['title_of_the_paper']; ?> </td>
                        <td> <?php echo $row['name_of_the_conference']; ?> </td>
						<td> <?php echo $row['national_or_international']; ?> </td>
                        <td> <?php echo $row['year_of_publication']; ?> </td>
                        <td> <?php echo $row['ISBN_Or_ISSN_Number']; ?> </td>
                        <td> <?php echo $row['name_of_publisher']; ?> </td>
                        <td> <?php echo $row['indexing']; ?> </td>
                        <td> <?php echo $row['other']; ?> </td>
                        <td><a href="<?php echo $developer['paper_link']; ?>" target="_blank"><?php echo $row['paper_link']; ?></a></td>
                        <td>

                        <a href="../../student/paper_publication/IEEE_paper_format/<?php echo $developer['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							<a href="../../student/paper_publication/certificate/<?php echo $developer['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                            <a href="../../student/paper_publication/conference_paper/<?php echo $developer['pdffile3']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                            <a class="edit btn-success editbtn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete btn-danger deletebtn" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                    <td>
                    <?php if ($row['STATUS'] == 'PENDING') { ?>
                                    <form method="POST" action="approved.php">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="submit" name="approve" value="Approve">
                                    </form>
                                    <form method="post" action="reject.php">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="reject" class="btn btn-danger"> Send Back</button>
                                    </form>
                                <?php } elseif ($row['STATUS'] == 'Sent Back') { ?>
                                    <?php echo $row['STATUS']; ?>
                                    <form method="POST" action="approve-now.php">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="submit" name="approve_now" value="Approve Now">
                                    </form>
                                <?php } else { ?>
                                    <?php echo $row['STATUS']; ?>
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
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
                $('#academic_year').val(data[1]);
                $('#name_of_the_student').val(data[2]);
                $('#roll_number').val(data[3]);
                $('#Branch').val(data[4]);
                $('#division').val(data[5]);
                $('#Year_Of_Study').val(data[6]);
                $('#title_of_the_paper').val(data[7]);
                $('#name_of_the_conference').val(data[8]);
				$('#national_or_international').val(data[9]);
                $('#year_of_publication').val(data[10]);
                $('#ISBN_Or_ISSN_Number').val(data[11]);
                $('#name_of_publisher').val(data[12]);
                $('#indexing').val(data[13]);
                $('#other').val(data[14]);
                $('#paper_link').val(data[15]);
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