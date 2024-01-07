<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="global.css">
</head>

<body class="bg-dark">

<header>
  <!-- Hero -->
  <div class="p-5 text-center bg-light">
    <img class="logo" src="https://i.postimg.cc/wvDjdZdp/logo.png" alt="image" width="10%">
    <h1 class="mb-3">Information Management System</h1>
    <h4 class="mb-3">(IMS-FCRIT)</h4>
    <div class="dropdown">
        <select class="btn btn-primary" name="list" onChange="window.location.href=this.value">
            <option value="">SELECT ROLE</option>
            <option value="professors/login.php">Faculty</option>
            <option value="branchadmins/login.php">Branch Admin</option>
            <option value="fdpadmins/login.php">FDP Admin</option>
            <option value="iqacadmins/login.php">IQAC Admin</option>
            <option value="superadmin/login.php">Super Admin</option>
<<<<<<< Updated upstream
            <option value="club_index.php">Club</option>
=======
            <option value="clubs_index.php">Clubs</option>
            
>>>>>>> Stashed changes
        </select>
    </div>
  </div>
  <!-- Hero -->
</header>
   
  <div class="footer">
    <p>Developed and Maintained by Department of Information Technology</p>
    <a href="developer-page.php">Developers</a>
  </div> 

</body>
</html>

