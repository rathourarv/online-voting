<?php session_start();
include("../functions.php");
$username = $_POST['username'];
$password = $_POST['password'];

$conn = get_connection();

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$user = $result->fetch_assoc();
	$_SESSION['logged_in'] = 'Yes';
	$_SESSION['email'] = $user['email'];
	$_SESSION['first_name'] = $user['firstName'];
	$_SESSION['last_name'] = $user['lastName'];
	$_SESSION['primary_id'] = $user['userID'];
	header('location: ../index.php');
} else {
	session_destroy();
	echo "Wrong Email and pwd";
	echo "<html><body><a href=\"../login.php\">click here to login again </a></body></html>";
}
?>