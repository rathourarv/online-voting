<?php
include("../header.php");
if (is_admin()) {
    include("../functions.php");
    $conn = get_connection();
    add_election($conn);
    header('Location: ../elections.php');
    $conn->close();
} else {
    header('Location: ../index.php');
    exit;
} ?>