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
                            <label>Year</label>
                            <select name="Academic_year" class="form-control" required>
                                <option value="">--Select Year--</option>
                                <option name="Academic_year" value="2017-18">2017-18</option>
                                <option name="Academic_year" value="2018-19">2018-19</option>
                                <option name="Academic_year" value="2019-20">2019-20</option>
                                <option name="Academic_year" value="2020-21">2020-21</option>
                                <option name="Academic_year" value="2021-22">2021-22</option>
                                <option name="Academic_year" value="2021-22">2022-23</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Branch</label>
                            <select name="Branch" class="form-control" required>
                                <option name="Branch" value="IT">IT</option>
                                <option name="Branch" value="EXTC">EXTC</option>
                                <option name="Branch" value="Mechanical">Mechanical</option>
                                <option name="Branch" value="Computers">Computers</option>
                                <option name="Branch" value="Electrical">Electrical</option>
                                <option name="Branch" value="Humanities">Humanities</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Title of the professional development program </label>
                            <input type="text" name="Title_Of_Program" class="form-control" placeholder="Enter Title" required>
                        </div>

                        <div class="form-group">
                            <label> Mention Approving Body Name (Eg - AICTE, ISTE, etc.)</label>
                            <input type="text" name="Approving_Body" class="form-control" placeholder="Mention Approving Body Name" required>
                        </div>

                        <div class="form-group">
                            <label> If Sponsored, Enter Grant Amount </label>
                            <input type="number" name="Grant_Amount" class="form-control" placeholder="Enter Grant Amount">
                        </div>

                        <div class="form-group">
                            <label> Convener of FDP/STTP </label>
                            <input type="text" name="Convener_Of_FDP_STTP" class="form-control" placeholder="Enter Name of Convener" required>
                        </div>

                        <div class="form-group">
                            <label> Starting Date </label>
                            <input type="date" id="Dates_From" name="Dates_From" class="form-control" placeholder="Enter Start Date" required>
                        </div>

                        <div class="form-group">
                            <label> Ending Date </label>
                            <input type="date" id="Dates_To" name="Dates_To" class="form-control" placeholder="Enter Ending Date" required>
                        </div>

                        <div class="form-group">
                            <label> Total Number of days of FDP/STTP </label>
                            <input type="number" name="Total_No_Of_Days" class="form-control" placeholder="Total Number of Days" required>
                        </div>

                        <div class="form-group">
                            <label> Number of Participants </label>
                            <input type="number" name="No_Of_Participants" class="form-control" placeholder="Enter Number of Participants" required>
                        </div>

                        <div class="form-group">
                            <label> Submit Report </label>
                            <input type="file" name="pdffile" id="pdf-file" required/><br>
                                    <img src="" id="pdf-file-tag" width="100px" />

                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                
                                                reader.onload = function (e) {
                                                    $('#pdf-file-tag').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $("#pdf-file").change(function(){
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
                <h2> FDP / STTP Organised </h2>
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
                                <th scope="col"> YEAR </th>
                                <th scope="col"> Branch </th>
                                <th scope="col"> TITLE </th>
                                <th scope="col"> APPROVING BODY </th>
                                <th scope="col"> GRANT AMOUNT </th>
                                <th scope="col"> CONVENER </th>
                                <th scope="col"> FROM DATE </th>
                                <th scope="col"> END DATE </th>
                                <th scope="col"> NO OF DAYS </th>
                                <th scope="col"> PARTICIPANTS</th>
                                <th scope="col"> ACTION </th>
                               
                            </tr>
                        </thead>
                        
                        <?php
                        $user = $_SESSION["role"];                        
                        $result = "SELECT * FROM fdpadmins WHERE username = '$user'";

                        $query = mysqli_query($connection, $result);
                        $queryresult = mysqli_num_rows($query); 
                            if($queryresult > 0){
                                while($row = mysqli_fetch_assoc($query)){ 
                                    $id = $row['id'];
                                    $branch = $row['branch'];
                                }  
                            }

                        $table_query = "SELECT * FROM fdpsttporganised WHERE branch = '$branch' ORDER BY id ASC";  
                        $query_run = mysqli_query($connection, $table_query);
                        $query_result = mysqli_num_rows($query_run); ?>

                        <?php if($query_result > 0){
                                        while($developer = mysqli_fetch_assoc($query_run)){   
                                            ?>
                        <tbody> <!-- change -->
                            <tr>
                                <td> <?php echo $developer['id']; ?> </td>
                                <td> <?php echo $developer['Academic_year']; ?> </td> 
                                <td> <?php echo $developer['Branch']; ?> </td>
                                <td> <?php echo $developer['Title_Of_Program']; ?> </td>
                                <td> <?php echo $developer['Approving_Body']; ?> </td>
                                <td> <?php echo $developer['Grant_Amount']; ?> </td>
                                <td> <?php echo $developer['Convener_Of_FDP_STTP']; ?> </td>
                                <td> <?php echo $developer['Dates_From']; ?> </td>
                                <td> <?php echo $developer['Dates_To']; ?> </td>
                                <td> <?php echo $developer['Total_No_Of_Days']; ?> </td>
                                <td> <?php echo $developer['No_Of_Participants']; ?> </td>
                                <td>
                            <!--<a href="read.php?viewid=<?php echo htmlentities ($developer['id']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>-->
                            <a class="edit btn-success editbtn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="uploadsfdporganised/<?php echo $developer['pdffile']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
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
                            <label> Academic Year</label>
                            <input id='Academic_year' type="text" name="Academic_year" class="form-control" placeholder="Enter Title" required>
                        </div>
                        
                        <div class="form-group">
                            <label> Branch/Department Name </label>
                            <input id='Branch' type="text" name="Branch" class="form-control" placeholder="Enter Title" required>
                        </div>

                        <div class="form-group">
                            <label> Approving Body </label>
                            <input id="Approving_Body" type="text" name="Approving Body" class="form-control" placeholder="AICTE/ISTE/Others" required>
                        </div>
                        
                        <div class="form-group">
                            <label> If Sponsored, Enter Grant Amount </label>
                            <input id='Grant_Amount' type="text" name="Grant_Amount" class="form-control" placeholder="Enter Grant Amount">
                        </div>

                        <div class="form-group">
                            <label> Convener of FDP/STTP </label>
                            <input id='Convener_Of_FDP_STTP' type="text" name="Convener_Of_FDP_STTP" class="form-control" placeholder="Enter Name of Convener">
                        </div>

                        <div class="form-group">
                            <label> Starting Date </label>
                            <input type="date" id="Dates_From" name="Dates_From" class="form-control" placeholder="Enter Start Date" required>
                        </div>

                        <div class="form-group">
                            <label> Ending Date </label>
                            <input type="date" id="Dates_To" name="Dates_To" class="form-control" placeholder="Enter End Date" required >
                        </div>

                        <div class="form-group">
                            <label> Total Number of days of FDP/STTP </label>
                            <input id='Total_No_Of_Days' type="text" name="Total_No_Of_Days" class="form-control" placeholder="Enter no of Days" required>
                        </div>

                        <div class="form-group">
                            <label> Number of Participants </label>
                            <input id= "No_Of_Participants" type="text" name="No_Of_Participants" class="form-control" placeholder="Enter Number of Participants" required>
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
                            <th> YEAR </th>
                            <th> Branch </th>
                            <th> TITLE </th>
                            <th> APPROVING BODY </th>
                            <th> GRANT AMOUNT </th>
                            <th> CONVENER </th>
                            <th> FROM DATE </th>
                            <th> END DATE </th>
                            <th> NO OF DAYS </th>
                            <th> PARTICIPANTS</th>
                        </tr>
                    <thead>       
<?php 
    if (isset($_POST["submit"])) {
        $str = mysqli_real_escape_string($connection, $_POST["search"]);

        $sth = "SELECT * FROM `fdpsttporganised` WHERE Branch LIKE '%$branch%' AND (Academic_year LIKE '%$str%' OR Approving_Body LIKE '%$str%' OR Title_Of_Program LIKE '%$str%' OR Convener_Of_FDP_STTP LIKE '%$str%')";
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
                        <td> <?php echo $row['Branch']; ?> </td> 
                        <td> <?php echo $row['Title_Of_Program']; ?> </td>
                        <td> <?php echo $row['Approving_Body']; ?> </td>
                        <td> <?php echo $row['Grant_Amount']; ?> </td>
                        <td> <?php echo $row['Convener_Of_FDP_STTP']; ?> </td>
                        <td> <?php echo $row['Dates_From']; ?> </td>
                        <td> <?php echo $row['Dates_To']; ?> </td>
                        <td> <?php echo $row['Total_No_Of_Days']; ?> </td>
                        <td> <?php echo $row['No_Of_Participants']; ?> </td>
                        <td>
                            <!--<a href="read.php?viewid=<?php echo htmlentities ($developer['id']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>-->
                            <a class="edit btn-success editbtn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="uploadsextc/<?php echo $developer['pdffile']; ?>"  class="download" title="Download" data-toggle="tooltip"><i class="fa fa-download"></i></a>
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
                $('#Academic_year').val(data[1]);
                $('#Branch').val(data[2]);
                $('#Title_Of_Program').val(data[3]);
                $('#Approving_Body').val(data[4]);
                $('#Grant_Amount').val(data[5]);
                $('#Convener_Of_FDP_STTP').val(data[6]);
                $('#Dates_From').val(data[7]);
                $('#Dates_To').val(data[8]);
                $('#No_Of_Participants').val(data[9]);
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