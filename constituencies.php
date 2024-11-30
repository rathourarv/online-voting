<!-- Header section  -->
<?php
include("header.php");
include("functions.php");
$conn = get_connection();
?>

<!-- Main section -->
<?php $constituencies = fetch_all_constituencies($conn); ?>
<div class="container">
    <h2>Constituencies</h2>
    <hr>
    <form method="POST" class="mb-4" action="constituency/add_constituency.php">
        <div class="row">
            <div class="col-md-4">
                <label for="name" class="form-label">Constituency Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="state" class="form-label">State</label>
                <input type="text" name="state" id="state" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="type" class="form-label">Type</label>
                <select id="type" name="type" class="form-control">
                    <option selected>GENERAL</option>
                    <option>SC</option>
                    <option>ST</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end" style="margin-top:25px">
                <button type="submit" name="add" class="btn btn-primary w-100">Add constituency</button>
            </div>
        </div>
    </form>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Constituency ID</th>
                <th scope="col">Constituency Name</th>
                <th scope="col">Constituency State</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($constituency = $constituencies->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($constituency["constituencyID"]); ?></td>
                    <td><?php echo htmlspecialchars($constituency["constituencyName"]); ?></td>
                    <td><?php echo htmlspecialchars($constituency["state"]); ?></td>
                    <td><?php echo htmlspecialchars($constituency["Type"]); ?></td>
                    <td><a href=<?php echo "constituency/delete_constituency.php?constituency_id={$constituency['constituencyID']}" ?>>delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Footer section  -->
<?php include("footer.php") ?>
<?php $conn->close(); ?>