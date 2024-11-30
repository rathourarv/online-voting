<!-- Header section  -->
<?php
include("header.php");
if (!isset($_SESSION['primary_id'])) {
    header('Location: login.php');
    exit;
} else {
    include("functions.php");
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $conn = get_connection();
    $profile = fetch_profile($conn, $_SESSION["primary_id"]);
    $candidates = fetch_candidates(conn: $conn, election_id: $queries["election_id"], constituency_id: $profile["constituency_id"]);
    include("pages/votes.php");
    include("footer.php");
    $conn->close();
}
?>