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
    <title> Competitive Exams</title>

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

    <!-- Modal -->
    <!-- this is add data form Make changes to variables, keep same variables -->
    <div class="modal fade mt-2" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST" enctype="multipart/form-data" >

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Academic Year (July 1st- June-30th)*</label>
                            <select name="Year" class="form-control" required>
                                <option value="">--Select Year--</option>
                                <option name="Year" value="2019-20">2019-20</option>
                                <option name="Year" value="2020-21">2020-21</option>
                                <option name="Year" value="2021-22">2021-22</option>
                                <option name="Year" value="2022-23">2022-23</option>
                                <option name="Year" value="2023-24">2023-24</option>
                                <option name="Year" value="2024-25">2024-25</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Registration number* </label>
                            <input type="number" name="Registration_number" class="form-control" placeholder="Enter Registration_number" required>
                        </div>

                        
                        <div class="form-group">
                            <label> Name of Student* </label>
                            <input type="text" name="Name_of_student" class="form-control" placeholder="Name_of_student" required>
                        </div>

                        <div class="form-group">
                            <label> FCRIT Roll No* </label>
                            <input type="number" name="Fcrit_Roll_no" class="form-control" placeholder="Fcrit_Roll_no" required>
                        </div>
                
                        <div class="form-group">
                            <label>Branch</label>
                            <select name="Branch" class="form-control" required disabled>
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
                            <label>Name of Exam*</label>
                            <select name="Name_of_exam" class="form-control" required>
                                <option value="">--Select Exam--</option>
                                <option name="Name_of_exam" value="GATE">GATE</option>
                                <option name="Name_of_exam" value="GMAT">GMAT</option>
                                <option name="Name_of_exam" value="CAT">CAT</option>
                                <option name="Name_of_exam" value="GRE">GRE</option>
                                <option name="Name_of_exam" value="JAM">JAM</option>
                                <option name="Name_of_exam" value="IELET">IELET</option>
                                <option name="Name_of_exam" value="TOEFFL">TOEFFL</option>
                                <option name="Name_of_exam" value="CIVIL_SERVICE">CIVIL_SERVICE</option>
                                <option name="Name_of_exam" value="IELTS">IELTS</option>
                                <option name="Name_of_exam" value="OTHER">OTHER</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> If other specify </label>
                            <input type="text" name="other" class="form-control" placeholder="Enter other">
                        </div>

                    <div class="form-group">
                            <label> Qualified Certificate* </label>
                            <input type="file" name="pdffile1" id="pdffile1" accept="application/pdf" required/><br>
                                    <img src="" id="pdf-file1-tag" width="100px" />

                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                
                                                reader.onload = function (e) {
                                                    $('#pdf-file1-tag').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $("#pdffile1").change(function(){
                                            readURL(this);
                                        });
                                    </script><br>
						</div>
                       			


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="insertbutton" name="insertdata" class="btn btn-primary" onClick="datechecker() ">Save Data</button>
                    </div>
                </form>

            </div>
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
                <h2> COMPETITIVE EXAMS</h2>
            </div>
            <div class="card">
                <div class="card-body btn-group">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal"> 
                        ADD DATA
                    </button>
            </form> &nbsp;

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
                                <th scope="col"> ACADEMIC YEAR </th>
                                <th scope="col"> REGISTRATION NUMBER </th>
                                <th scope="col"> NAME OF STUDENT </th>
                                <th scope="col"> FCRIT ROLL NUMBER </th>
                                <th scope="col"> BRANCH </th>
                                <th scope="col"> NAME OF EXAM </th>
                                <th scope="col"> OTHER </th>
                                <th scope="col"> QUALIFIED CERTIFICATE </th>
                                <th scope="col"> STATUS </th>
                        </tr>
                    </thead>       
                        
                        <?php
                        $user = $_SESSION["role"];
                        
                        $result = "SELECT * FROM placement_coordinator WHERE username = '$user'";

                        $query = mysqli_query($connection, $result);
                        $queryresult = mysqli_num_rows($query); 
                            if($queryresult > 0){
                                while($row = mysqli_fetch_assoc($query)){ 
                                    $id = $row['id'];
                                    $branch = $row['branch'];
                                
                                }  
                            }

                        $table_query = "SELECT * FROM competitiveexams WHERE user_id='$id' ";  
                        
                        $query_run = mysqli_query($connection, $table_query);
                        $query_result = mysqli_num_rows($query_run); ?>

                        <?php if($query_result > 0){
                                        while($developer = mysqli_fetch_assoc($query_run)){   
                                            ?>
                        <tbody> <!-- change -->
                            <tr>
                            <?php
                $status = $developer['STATUS'];
                $is_disabled = ($status == "approved") ? "disabled" : "";
                // If STATUS is "approved", set the $is_disabled variable to "disabled"
                ?>
                                <td> <?php echo $developer['id']; ?> </td>
                                <td> <?php echo $developer['Year']; ?> </td>
                                <td> <?php echo $developer['Registration_number']; ?> </td> 
                                <td> <?php echo $developer['Name_of_student']; ?> </td>
                                <td> <?php echo $developer['Fcrit_Roll_no']; ?> </td>
                                <td> <?php echo $developer['Branch']; ?> </td>
                                <td> <?php echo $developer['Name_of_exam']; ?> </td>
                                <td> <?php echo $developer['OTHER']; ?> </td>
                                <td>
                            <!-- <a href="read.php?viewid=<?php echo htmlentities ($developer['id']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a> -->
                            <!-- <a class="edit btn-success editbtn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> -->
                            
							<a href="exams/<?php echo $developer['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
                            <!-- <a class="delete btn-danger deletebtn" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a> -->
						
                            <?php if ($status == "approved") { ?>
    <!-- Code for when the status is approved -->
    <!-- You can hide the delete and edit buttons for the approved status -->
<?php } elseif ($status == "Sent Back") { ?>
    <!-- Code for when the status is sent back -->
    <a class="edit btn-success editbtn" title="Edit" data-toggle="tooltip" <?php echo $is_disabled ?>>
        <i class="material-icons">&#xE254;</i>
    </a>
<?php } else { ?>
    <!-- Code for when the status is pending or any other status -->
    <a class="edit btn-success editbtn" title="Edit" data-toggle="tooltip" <?php echo $is_disabled ?>>
        <i class="material-icons">&#xE254;</i>
    </a>
    <a class="delete btn-danger deletebtn" title="Delete" data-toggle="tooltip" <?php echo $is_disabled ?>>
        <i class="material-icons">&#xE872;</i>
    </a>
<?php } ?>
                </td>

                <td> <?php echo $status; ?> </td>
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
                            <label>Academic Year (July 1st- June-30th)*</label>
                            <select id="Year" name="Year" class="form-control" required>
                                <option value="">--Select Year--</option>
                                <option name="Year" value="2019-20">2019-20</option>
                                <option name="Year" value="2020-21">2020-21</option>
                                <option name="Year" value="2021-22">2021-22</option>
                                <option name="Year" value="2022-23">2022-23</option>
                                <option name="Year" value="2023-24">2023-24</option>
                                <option name="Year" value="2024-25">2024-25</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Registration number* </label>
                            <input type="text"  id="Registration_number" name="Registration_number" class="form-control" placeholder="Enter Registration_number" required>
                        </div>


                        <div class="form-group">
                            <label> Name of Student* </label>
                            <input type="text" id="Name_of_student" name="Name_of_student" class="form-control" placeholder="Name_of_student" required>
                        </div>

                        <div class="form-group">
                            <label> FCRIT Roll No* </label>
                            <input type="number" id="Fcrit_Roll_no" name="Fcrit_Roll_no" class="form-control" placeholder="Fcrit_Roll_no" required>
                        </div>

                        <div class="form-group">
                            <label>Branch</label>
                            <select name="Branch" class="form-control" required disabled>
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
                            <label>Name of Exam*</label>
                            <select name="Name_of_exam"  id="Name_of_exam" class="form-control" required>
                                <option value="">--Select Exam--</option>
                                <option name="Name_of_exam" value="GATE">GATE</option>
                                <option name="Name_of_exam" value="GMAT">GMAT</option>
                                <option name="Name_of_exam" value="CAT">CAT</option>
                                <option name="Name_of_exam" value="GRE">GRE</option>
                                <option name="Name_of_exam" value="JAM">JAM</option>
                                <option name="Name_of_exam" value="IELET">IELET</option>
                                <option name="Name_of_exam" value="TOEFFL">TOEFFL</option>
                                <option name="Name_of_exam" value="CIVIL_SERVICE">CIVIL_SERVICE</option>
                                <option name="Name_of_exam" value="IELTS">IELTS</option>
                                <option name="Name_of_exam" value="OTHER">OTHER</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> If other specify </label>
                            <input type="text" id="other" 
                            name="other" 
                            class="form-control" placeholder="Enter other">
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
                                <th scope="col"> REGISTRATION NUMBER </th>
                                <th scope="col"> NAME OF STUDENT </th>
                                <th scope="col"> FCRIT ROLL NUMBER </th>
                                <th scope="col"> BRANCH </th>
                                <th scope="col"> NAME OF EXAM </th>
                                <th scope="col"> OTHER </th>
                                <th scope="col"> QUALIFIED CERTIFICATE </th>
                                <th scope="col"> STATUS </th>
                        </tr>
                    </thead>       

<?php 
    if (isset($_POST["submit"])) {
        $str = mysqli_real_escape_string($connection, $_POST["search"]);

        $sth = "SELECT * FROM `competitiveexams` WHERE user_id=$id AND (Branch LIKE '%$str%' OR Registration_number LIKE '%$str%' OR Name_of_student LIKE '%$str%' OR Fcrit_Roll_no LIKE '%$str%' OR Name_of_exam LIKE '%$str%' OR Year LIKE '%$str%' OR other LIKE '%$str%' OR STATUS LIKE '$str' ) ";
        
        $result = mysqli_query($connection, $sth);
        $queryresult = mysqli_num_rows($result); ?>

                <div class="card">
                    <div class="card-body btn-group">
                        <div> Results- </div> &nbsp; &nbsp;
                        <button class="btn btn-success" onclick="exportTableToCSV('Search_data.csv')"> Export Data </button>
                    </div>
                </div>
                    
                    <?php if($queryresult > 0){
                while($row = mysqli_fetch_assoc($result)){   
                    ?>
                <tbody id="srch"> 
             
                    <tr>                
                    <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['Year']; ?> </td>
                                <td> <?php echo $row['Registration_number']; ?> </td> 
                                <td> <?php echo $row['Name_of_student']; ?> </td>
                                <td> <?php echo $row['Fcrit_Roll_no']; ?> </td>
                                <td> <?php echo $row['Branch']; ?> </td>
                                <td> <?php echo $row['Name_of_exam']; ?> </td>
                                <td> <?php echo $row['OTHER']; ?> </td>
                                
                              <td>
                            <!--<a href="read.php?viewid=<?php echo htmlentities ($row['id']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>-->
                            <!-- <a class="edit btn-success editbtn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> -->
                            <a href="../../placement_coordinator/competitive_exams/<?php echo $row['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							<!-- <a href="uploadsfrontit/<?php echo $row['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a> -->
                            <!-- <a class="delete btn-danger deletebtn" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
							 -->
                            
                            
                            <!-- <button class="btn"><i class="fa fa-download"></i> Download</button> -->
                            <?php if ($status != "approved") { // If STATUS is not "approved", show the edit and delete buttons ?>
                        <a class="edit btn-success editbtn" title="Edit" data-toggle="tooltip" <?php echo $is_disabled ?>>
                            <i class="material-icons">&#xE254;</i>
                        </a>

                        <a class="delete btn-danger deletebtn" title="Delete" data-toggle="tooltip" <?php echo $is_disabled ?>>
                            <i class="material-icons">&#xE872;</i>
                        </a>
                    <?php } ?>
                            </td>
                        <td> <?php echo $row['STATUS']; ?> </td>
                    </tr> 
                </tbody>
                            </table>
                    <?php 
            }

        } else {
            echo "No Results Found";
        }
    }
    ?>
    
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
                $('#Year').val(data[1]);
                $('#Branch').val(data[2]);
                $('#Registration_number').val(data[3]);
                $('#Name_of_student').val(data[4]);
                $('#Name_of_exam').val(data[5]);
                $('#other').val(data[6]);
                $('#pdffile1').val(data[7]);
                // $('#pdffile2').val(data[13]);
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