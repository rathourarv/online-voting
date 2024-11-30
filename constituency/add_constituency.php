<?php
include("../header.php");
if (is_admin()) {
    include("../functions.php");
    $conn = get_connection();
    add_constituency($conn);
    header('Location: ../constituencies.php');
    $conn->close();
} else {
    header('Location: ../index.php');
    exit;
} ?>