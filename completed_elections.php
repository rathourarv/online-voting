<?php
include("functions.php");
$conn = get_connection();
?>

<!-- Header section  -->
<?php include("header.php") ?>

<!-- Main section -->
<?php $current_elections = fetch_completed_elections($conn); ?>
<div class="container">
    <h2>Completed Elections</h2>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Election Id</th>
                <th scope="col">Election Name</th>
                <th scope="col">Election Type</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Result</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($election = $current_elections->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($election["rowNumber"]); ?></td>
                    <td><?php echo htmlspecialchars($election["electionName"]); ?></td>
                    <td><?php echo htmlspecialchars($election["electionType"]); ?></td>
                    <td><?php echo htmlspecialchars($election["startDate"]); ?></td>
                    <td><?php echo htmlspecialchars($election["endDate"]); ?></td>
                    <td><a href=<?php echo "/result.php?id={$election['electionID']}" ?>>View</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Footer section  -->
<?php include("footer.php") ?>
<?php $conn->close(); ?>