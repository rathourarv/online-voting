<?php
include("../functions.php");
$name = $_POST['name'];
$email = $_POST['email'];
$fback = $_POST['fback'];
$textbox = $_POST['textbox'];

$conn = get_connection();

$sql = "Insert into feedback(name,email,fback,textbox)" . "values('$name','$email','$fback','$textbox')";

// Execute the query
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();

header("location:../index.php");
?>