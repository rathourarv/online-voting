<?php
include("../header.php");
if (!isset($_SESSION['primary_id'])) {
    header('Location: login.php');
    exit;
} else {
    include("../functions.php");
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $conn = get_connection();
    $profile = fetch_profile($conn, $_SESSION["primary_id"]);
    submit_vote(conn: $conn, election_id: $queries["election_id"], constituency_id: $queries["constituency_id"], voter_id: $profile["id"]);
    // Close the connection
    $conn->close();
    header("location:../vote.php?election_id={$queries["election_id"]}");
}
?>