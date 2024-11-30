<?php
include("../header.php");
if (is_admin()) {
    include("../functions.php");
    $conn = get_connection();
    add_party($conn);
    header('Location: ../parties.php');
    $conn->close();
} else {
    header('Location: ../index.php');
    exit;
} ?>