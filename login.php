<?php
	//login.php
	session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
$connection = @mysqli_connect (localhost, root, BuffTech, login);
if(mysqli_connect_errno())
{
echo "<h4>Failed to connect to MySQL:
</h4>".mysqli_connect_error();
}
else
{
echo "<h4>Successfully connected to MySQL: </h4>";
}

$user = $_REQUEST['user']; 
$pass = $_REQUEST['pass'];
$queryU = mysqli_query($connection, "SELECT username FROM login WHERE username = '$user'");
$queryP = mysqli_query($connection, "SELECT password FROM login WHERE password = '$pass'");
$u = mysqli_fetch_array($queryU);
$p = mysqli_fetch_array($queryP);
$queryE = mysqli_query($connection, "SELECT email FROM login WHERE username = '$user'");
$e = mysqli_fetch_array($queryE);

if($u["username"] == $user and $p["password"] == $pass){	
	echo "Login Successful";
	$_SESSION['email'] = $e["email"];
	header("location: mainpage.php");
}
else{
	echo "Username or password is incorrect";
	echo"<br>";
echo "<a href='Project.php'>Return</a>";
}
mysqli_close($connection);
?>

</body>
<html>