<?php
include("../functions.php");
$conn = get_connection();
add_user($conn);
// Close the connection
$conn->close();
header('location:../index.php');
?>