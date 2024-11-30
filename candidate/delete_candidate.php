<?php
include("../header.php");
if (is_admin()) {
    include("../functions.php");
    $conn = get_connection();
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    delete_candidate($conn, $queries["candidate_id"]);
    header('Location: ../candidates.php');
    $conn->close();
} else {
    header('Location: ../index.php');
    exit;
} ?>