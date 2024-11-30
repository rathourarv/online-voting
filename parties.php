<!-- Header section  -->
<?php
include("header.php");
include("functions.php");
$conn = get_connection();
?>

<!-- Main section -->
<?php $parties = fetch_all_parties($conn); ?>
<div class="container">
    <h2>Political Parties</h2>
    <hr>
    <form method="POST" class="mb-4" action="party/add_party.php">
        <div class="row">
            <div class="col-md-3">
                <label for="name" class="form-label">Party Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="leader_name" class="form-label">Leader Name</label>
                <input type="text" name="leader_name" id="leader_name" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="symbol" class="form-label">Party Symbol</label>
                <input type="text" name="symbol" id="symbol" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="founded_year" class="form-label">Founded Year</label>
                <input type="number" name="founded_year" min="1800" max="2024" step="1" value="1980" class="form-control" required/>
                </div>
            <div class="col-md-2 d-flex align-items-end" style="margin-top:25px">
                <button type="submit" name="add" class="btn btn-primary w-100">Add Party</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Party ID</th>
                <th scope="col">Party Name</th>
                <th scope="col">Party Leader</th>
                <th scope="col">Party Symbol</th>
                <th scope="col">Founed Year</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <hr>
        <tbody>
            <?php while ($party = $parties->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($party["partyID"]); ?></td>
                    <td><?php echo htmlspecialchars($party["partyName"]); ?></td>
                    <td><?php echo htmlspecialchars($party["leaderName"]); ?></td>
                    <td><?php echo htmlspecialchars($party["partySymbol"]); ?></td>
                    <td><?php echo htmlspecialchars($party["foundedYear"]); ?></td>
                    <td><a href=<?php echo "party/delete_party.php?party_id={$party['partyID']}" ?>>delete</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Footer section  -->
<?php include("footer.php") ?>
<?php $conn->close(); ?>