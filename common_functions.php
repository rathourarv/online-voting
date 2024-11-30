<?php
function is_logged_in(): bool
{
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'Yes';
}

function is_admin(): bool
{
    return isset($_SESSION['primary_id']) && $_SESSION['primary_id'] == 1;
}
?>