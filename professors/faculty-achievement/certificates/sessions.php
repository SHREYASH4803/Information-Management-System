<?php
session_start();
$conn=mysqli_connect('localhost','root','','sad_practical')or die ('unable to connect')
?>
<!DOCTYPE html>
<head>
<style>
form {text-align: center;}
h2 {text-align: center;}
</style>
</head>
<body>
<h2>Please Login</h2>
<div>
<form action="sessions.php" method="post">
<input type="text" class="field" name="Username" placeholder="Username" required=""><br/>
<input type="password" class="field" name="Password" placeholder="Password" required=""><br/>
<input type="submit" class="field" name="login" value="Login">
</form>
</div>
<?php
if (isset($_POST['login'])){
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$select = mysqli_query($conn," SELECT * FROM signup WHERE Username = '$Username' AND Password = '$Password' ");
$row = mysqli_fetch_array($select);
if(is_array($row)){
$_SESSION["Username"] = $row ['Username'];
$_SESSION["Password"] = $row ['Password'];
setcookie('Username', $row['Username'],time()+60*60*24);
} else{
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Password!");'; ;
        echo 'window.location.href = "sessions.php" ';
        echo '</script>';
}
}
if(isset($_SESSION['Username']) || isset($_COOKIE['Username'])){header ("Location:sessions_fetch.php");
}
?>
</body>
</html>
