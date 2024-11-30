<?php
include("../header.php");
if (is_admin()) {
    include("../functions.php");
    $conn = get_connection();
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    delete_party($conn, $queries["party_id"]);
    header('Location: ../parties.php');
    $conn->close();
} else {
    header('Location: ../index.php');
    exit;
} ?>