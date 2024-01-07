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
    <title> Certificate Programs</title>

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
                            <label>Year of offering</label>
                            <select name="Year_of_offering" class="form-control" required>
                                <option value="">--Select Year--</option>
                                <option name="Year_of_offering" value="2017-18">2017-18</option>
                                <option name="Year_of_offering" value="2018-19">2018-19</option>
                                <option name="Year_of_offering" value="2019-20">2019-20</option>
                                <option name="Year_of_offering" value="2020-21">2020-21</option>
                                <option name="Year_of_offering" value="2021-22">2021-22</option>
                                <option name="Year_of_offering" value="2021-22">2022-23</option>
                            </select>
</div>
                        <div class="form-group">
                            <label>Department</label>
                            <select name="Branch" class="form-control" required>
                                <option value="">--Select Department--</option>
                                <option name="Department" value="IT">IT</option>
                                <option name="Department" value="EXTC">EXTC</option>
                                <option name="Department" value="Mechanical">Mechanical</option>
                                <option name="Department" value="Computers">Computers</option>
                                <option name="Department" value="Electrical">Electrical</option>
                                <option name="Department" value="Humanities">Humanities</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Course_coordinator </label>
                            <input type="text" name="Course_coordinator" class="form-control" placeholder="Enter Course_coordinator" required>
                        </div>

                        <div class="form-group">
                            <label> Programs_offered </label>
                            <input type="text" name="Programs_offered" class="form-control" placeholder="Programs_offered" required>
                        </div>

                        <div class="form-group">
                            <label> Course_code </label>
                            <input type="text" name="Course_code" class="form-control" placeholder="Enter course code">
                        </div>

                        <div class="form-group">
                            <label> No_of_times_offered </label>
                            <input type="number" name="No_of_times_offered" class="form-control" placeholder="Enter No_of_times_offered" required>
                        </div>
                        
                        <div class="form-group">
                            <label> Start_date </label>
                            <input type="date" name="Start_date" class="form-control" placeholder="Enter start date" required>
                        </div>

                        <div class="form-group">
                            <label> End_date </label>
                            <input type="date" name="End_date" class="form-control" placeholder="Enter end date" required>
                        </div>

                        <div class="form-group">
                            <label> Duration </label>
                            <input type="number" name="Duration" class="form-control" placeholder="Enter duration" required>
                        </div>

                        <div class="form-group">
                            <label> No_of_students_enrolled </label>
                            <input type="number" name="No_of_students_enrolled" class="form-control" placeholder="Enter No_of_students_enrolled" required>
                        </div>

                        <div class="form-group">
                            <label> No_of_students_completing </label>
                            <input type="number" name="No_of_students_completing" class="form-control" placeholder="Enter No_of_students_completing" required>
                        </div>



                

                        

                        <div class="form-group">
                            <label> Upload Report </label>
                            <input type="file" name="pdffile1" id="pdffile1" required/><br>
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
                <h2> Certificate programs</h2>
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
                                <th scope="col"> Department </th>
                                <th scope="col"> Course Coordinator </th>
                                <th scope="col"> Programs Offered </th>
                                <th scope="col"> Course Code </th>
                                <th scope="col"> Year of offering </th>
                                <th scope="col"> No of times offered </th>
								<th scope="col"> Start date </th>
                                <th scope="col"> End date </th>
                                <th scope="col"> Duration </th>
                                <th scope="col"> No of students enrolled </th>
                                <th scope="col"> No of students completing </th>
                                <th scope="col"> Upload Report </th>
                               
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
                                    $branch = $row['branch'];
                                }  
                            }

                        $table_query = "SELECT * FROM certificates WHERE user_id=$id";
                        
                        $query_run = mysqli_query($connection, $table_query);
                        $query_result = mysqli_num_rows($query_run); ?>

                        <?php if($query_result > 0){
                                        while($developer = mysqli_fetch_assoc($query_run)){   
                                            ?>
                        <tbody> <!-- change -->
                            <tr>
                                <td> <?php echo $developer['id']; ?> </td>
                                <td> <?php echo $developer['Department']; ?> </td> 
                                <td> <?php echo $developer['Course_coordinator']; ?> </td>
                                <td> <?php echo $developer['Programs_offered']; ?> </td>
                                <td> <?php echo $developer['Course_code']; ?> </td>
                                <td> <?php echo $developer['Year_of_offering']; ?> </td>
                                <td> <?php echo $developer['No_of_times_offered']; ?> </td>
                                <td> <?php echo $developer['Start_date']; ?> </td>
                                <td> <?php echo $developer['End_date']; ?> </td>
                                <td> <?php echo $developer['Duration']; ?> </td>
                                <td> <?php echo $developer['No_of_students_enrolled']; ?> </td>
                                <td> <?php echo $developer['No_of_students_completing']; ?> </td>
                                <td>
                            <!--<a href="read.php?viewid=<?php echo htmlentities ($developer['id']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>-->
                            <a class="edit btn-success editbtn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            
							<!-- <a href="uploadsfrontit/<?php echo $developer['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a> -->
                            <a class="delete btn-danger deletebtn" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
							
                            
                            
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
                            <label> Year of offering </label>
                            <input type="text"  id="Year_Of_offering" name="Year_of_offering" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label> Department </label>
                            <input type="text"  id="Department" name="Department"  class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label> Course_coordinator </label>
                            <input type="text"  id="Course_coordinator" name="Course_coordinator" class="form-control" placeholder="Enter Course coordinator" required>
                        </div>

                        <div class="form-group">
                            <label> Programs_offered </label>
                            <input type="text" name="Programs_offered" id="Programs_offered" class="form-control" placeholder="Programs_offered" required>
                        </div>

                        <div class="form-group">
                            <label> Course_code</label>
                            <input type="text" name="Course_code"  id="Course_code" class="form-control" placeholder="Enter course code">
                        </div>

                        <div class="form-group">
                            <label>  No_of_times_offered</label>
                            <input type="number" name="No_of_times_offered" id="No_of_times_offered" class="form-control" placeholder="Enter No_of_times_offered " required>
                        </div>

                        <div class="form-group">
                            <label>  Start_date</label>
                            <input type="date" name="Start_date" id="Start_date" class="form-control" placeholder="Enter Start_date " required>
                        </div>

                        <div class="form-group">
                            <label>  End_date</label>
                            <input type="date" name="End_date" id="End_date" class="form-control" placeholder="Enter End_date " required>
                        </div>

                        <div class="form-group">
                            <label>  Duration </label>
                            <input type="number" name= "Duration" id= "Duration" class="form-control" placeholder="Enter Duration  " required>
                        </div>

                        <div class="form-group">
                            <label>  No_of_students_enrolled</label>
                            <input type="number" name="No_of_students_enrolled" id="No_of_students_enrolled" class="form-control" placeholder="Enter No_of_students_enrolled " required>
                        </div>

                        <div class="form-group">
                            <label>  No_of_students_completing</label>
                            <input type="number" name="No_of_students_completing" id="No_of_students_completing" class="form-control" placeholder="Enter No_of_students_completing " required>
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
                                <th> ID </th>
                                <th> Department </th>
                                <th> Course Coordinator </th>
                                <th> Programs Offered </th>
                                <th> Course Code </th>
                                <th> Year of offering </th>
                                <th> No of times offered </th>
								<th> Start date </th>
                                <th> End date </th>
                                <th> Duration </th>
                                <th> No of students enrolled </th>
                                <th> No of students completing </th>
                                <th> Upload Report </th>
                               
                            </tr>
                        </thead>       
<?php 
    if (isset($_POST["submit"])) {
        $str = mysqli_real_escape_string($connection, $_POST["search"]);

        $sth = "SELECT * FROM `certificates` WHERE user_id=$id AND (Department LIKE '%$str%' OR Course_coordinator LIKE '%$str%' OR Programs_offered LIKE '%$str%' OR Course_code LIKE '%$str%' OR Year_of_offering LIKE '%$str%' OR No_of_times_offered LIKE '$str' OR Start_date LIKE '%$str%' OR End_date LIKE '%$str%' OR Duration LIKE '%$str%' OR No_of_students_enrolled LIKE '%$str%' OR No_of_students_completing LIKE '%$str%') ";
        
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
                                <td> <?php echo $row['Department']; ?> </td> 
                                <td> <?php echo $row['Course_coordinator']; ?> </td>
                                <td> <?php echo $row['Programs_offered']; ?> </td>
                                <td> <?php echo $row['Course_code']; ?> </td>
                                <td> <?php echo $row['Year_of_offering']; ?> </td>
                                <td> <?php echo $row['No_of_times_offered']; ?> </td>
                                <td> <?php echo $row['Start_date']; ?> </td>
                                <td> <?php echo $row['End_date']; ?> </td>
                                <td> <?php echo $row['Duration']; ?> </td>
                                <td> <?php echo $row['No_of_students_enrolled']; ?> </td>
                                <td> <?php echo $row['No_of_students_completing']; ?> </td>
                                <td>
                            <!--<a href="read.php?viewid=<?php echo htmlentities ($row['id']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>-->
                            <a class="edit btn-success editbtn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="uploadsindexit/<?php echo $row['pdffile1']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
							<!-- <a href="uploadsfrontit/<?php echo $row['pdffile2']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a> -->
                            <a class="delete btn-danger deletebtn" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
							
                            
                            
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
                $('#Department').val(data[1]);
                $('#Course_coordinator').val(data[2]);
                $('#Programs_offered').val(data[3]);
                $('#Course_code').val(data[4]);
                $('#Year_of_offering').val(data[5]);
                $('#No_of_times_offered').val(data[6]);
                $('#Start_date').val(data[7]);
                $('#End_date').val(data[8]);
                $('#Duration').val(data[9]);
                $('#No_of_students_enrolled').val(data[10]);
                $('#No_of_students_completing').val(data[11]);
                $('#pdffile1').val(data[12]);
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