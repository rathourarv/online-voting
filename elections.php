<!-- Header section  -->
<?php
include("header.php");
include("functions.php");
$conn = get_connection();
?>

<!-- Main section -->
<?php $elections = get_elections($conn); ?>
<div class="container">
    <h2>Elections</h2>
    <hr>
    <form method="POST" class="mb-4" action="elections/add_election.php">
        <div class="row">
            <div class="col-md-3">
                <label for="name" class="form-label">Election Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="election_type" class="form-label">Election Type</label>
                <select id="election_type" name="election_type" class="form-control">
                    <option selected>LOK_SABHA</option>
                    <option>VIDHAN_SABHA</option>
                    <option>MUNICIPAL</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>
            <div class="col-md-2 d-flex align-items-end" style="margin-top:25px">
                <button type="submit" name="add" class="btn btn-primary w-100">Add Election</button>
            </div>
        </div>
    </form>
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
            <?php while ($election = $elections->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($election["electionID"]); ?></td>
                    <td><?php echo htmlspecialchars($election["electionName"]); ?></td>
                    <td><?php echo htmlspecialchars($election["electionType"]); ?></td>
                    <td><?php echo htmlspecialchars($election["startDate"]); ?></td>
                    <td><?php echo htmlspecialchars($election["endDate"]); ?></td>
                    <td><a href=<?php echo "/elections/delete_election.php?election_id={$election['electionID']}" ?>>delete</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Footer section  -->
<?php include("footer.php") ?>
<?php $conn->close(); ?>