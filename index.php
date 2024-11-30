<?php
include("functions.php");
$conn = get_connection();
?>

<!-- Header section  -->
<?php include("header.php") ?>
<!-- Main section  -->
<div class="container">
    <?php include("pages/current_elections.php") ?>
    <?php include("pages/upcoming_elections.php") ?>
</div>

<!-- Footer section  -->
<?php include("footer.php") ?>
<?php $conn->close(); ?>