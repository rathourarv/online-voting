<?php
session_start();
include("../functions.php");
include("../common_functions.php");

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$aadhar_number = $_POST['aadhar_number'];
$voter_id = $_POST['voter_id'];
$constituency_id = $_POST['constituency_id'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$user_id = $_SESSION['primary_id'];

$queries = array();
if (isset($_SERVER['QUERY_STRING'])) {
  parse_str($_SERVER['QUERY_STRING'], $queries);
}

if (array_key_exists('user_id', $queries) && is_admin()) {
  $profile_id = $queries["user_id"];
} else {
  $profile_id = $user_id;
}
$conn = get_connection();
$profile = get_profile($conn, $profile_id);

if ($profile) {
  update_profile($conn, $profile["voterID"]);
} else {
  add_profile($conn, $user_id);
}

// Close the connection
$conn->close();
header("location:../profile.php?user_id={$profile_id}");
?>