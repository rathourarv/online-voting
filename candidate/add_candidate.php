<?php
include("../header.php");
if (is_admin()) {
    include("../functions.php");
    $conn = get_connection();
    add_candidate($conn);
    header('Location: ../candidates.php');
    $conn->close();
} else {
    header('Location: ../index.php');
    exit;
} ?>