<!-- Header section  -->
<?php
include("header.php");
include("functions.php");
$conn = get_connection();
?>

<!-- Main section -->
<?php $voters = fetch_all_voters($conn); ?>
<div class="container">
    <h2>Voters</h2>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Voter ID</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Dob</th>
                <th scope="col">Address</th>
                <th scope="col">Constituency</th>
                <th scope="col">Aadhar Number</th>
                <th scope="col">Voter Card Number</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($voter = $voters->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($voter["voterID"]); ?></td>
                    <td><?php echo htmlspecialchars(sprintf("%s %s", $voter["firstName"], $voter["lastName"])); ?></td>
                    <td><?php echo htmlspecialchars($voter["gender"]); ?></td>
                    <td><?php echo htmlspecialchars($voter["dob"]); ?></td>
                    <td><?php echo htmlspecialchars(sprintf("%s, %s, %s, %s, %s", $voter["address1"], $voter["address2"], $voter["city"], $voter["state"], $voter["zip"])); ?></td>
                    <td><?php echo htmlspecialchars($voter["constituencyID"]); ?></td>
                    <td><?php echo htmlspecialchars($voter["aadhaarNumber"]); ?></td>
                    <td><?php echo htmlspecialchars($voter["voterIDCard"]); ?></td>
                    <td><a href=<?php echo "/profile.php?user_id={$voter['userID']}" ?>>Edit</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>


<!-- Footer section  -->
<?php include("footer.php") ?>
<?php $conn->close(); ?>