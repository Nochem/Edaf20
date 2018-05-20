<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else
	{
//Tar emot username/password
		$username=$_POST['username'];
		$password=$_POST['password'];
//Laddar connect parametrarna
		include "database/connect.php";
		
//Säkerhetstjofräs och saltning/hash
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($con, $username);
		$password = mysqli_real_escape_string($con, $password);

		mysqli_query($con,"SET NAMES utf8"); 
		//$userData = mysqli_query($con,"SELECT * FROM Users");
		
// SQL query to fetch information of registerd users and finds user match.
		$query = mysqli_query( $con,"SELECT * from UsersKrusty WHERE Password='$password' AND Username='$username'");
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
		$row = mysqli_fetch_assoc($query);
		$_SESSION['login_user']=$username; // Initializing Session
		$_SESSION['parent'] = $row['Parent'];
		$_SESSION['database'] = $row['Database'];
		$_SESSION['level'] = $row['Access'];
		$_SESSION['name'] = $row['Name'];
		header("location: main.php"); // Redirecting To Other Page
		} else {
			$error = "Username or Password is invalid";
			}
mysqli_close($con); // Closing Connection
}
}
?>