<div class="btn-group">
    <button type="button" class="btn btn-secondary dropdown-toggle user-button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <?php echo $username ?>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="/profile.php">Profile</a></li>
        <li><a class="dropdown-item" href="/feedback.php">Feedback</a></li>
        <li><a class="dropdown-item" href="/about_us.php">About Us</a></li>
        <li><a class="dropdown-item" href="handlers/logout.php">Logout</a></li>
    </ul>
</div>