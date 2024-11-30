<?php
session_start();
include("common_functions.php");
$menu = array();
if (is_admin()) {
    $menu = array(
        "Home" => "/",
        "Elections" => "/elections.php",
        "Parties" => "/parties.php",
        "Constituencies" => "/constituencies.php",
        "Candidates" => "/candidates.php",
        "Voters" => "/voters.php",
        "Results" => "/completed_elections.php",
    );
} else {
    $menu = array(
        "Home" => "/",
        "Results" => "/completed_elections.php"
    );
}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to Online Election System</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar using Bootstrap  -->
    <nav class="navbar navbar-expand-lg navbar-inverse bg-light" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/image.png" alt="..." height="25">
            </a>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand">Welcome to Online Election System</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php foreach ($menu as $name => $href) {
                        echo "<li><a href='{$href}'>{$name}</a><li>";
                    }
                    ?>
                    <li>
                        <?php
                        if (is_logged_in()) {
                            $username = $_SESSION['first_name'];
                            include("pages/logged_in.php");
                        } else {
                            echo '<a href="login.php">Login</a>';
                        }
                        ?>
                    <li>
                </ul>
            </div>
        </div>
    </nav>