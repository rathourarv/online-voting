<!-- Header section  -->
<?php include("header.php");
if (!isset($_SESSION['primary_id'])) {
    header('Location: login.php');
    exit;
} else {
    include("functions.php");
    $conn = get_connection();
    $queries = array();

    if (isset($_SERVER['QUERY_STRING'])) {
        parse_str($_SERVER['QUERY_STRING'], $queries);
    }

    if (array_key_exists('user_id', $queries) && is_admin()) {
        $profile_id = $queries["user_id"];
    } else {
        $profile_id = $_SESSION['primary_id'];
    }
    $profile = fetch_profile($conn, $profile_id);
    include("pages/logged_in_profile.php");
    include("footer.php");
} ?>