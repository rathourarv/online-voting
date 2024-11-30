<!-- Header section  -->
<?php
include("header.php");
include("functions.php");
$conn = get_connection();
?>

<!-- Main section -->
<?php
$candidates = fetch_all_candidates($conn);
$parties = fetch_all_parties($conn);
$elections = get_elections($conn);
$constituencies = fetch_all_constituencies($conn);
?>
<div class="container">
    <h2>Candidates</h2>
    <hr>
    <form method="POST" class="mb-4" action="candidate/add_candidate.php">
        <div class="row">
            <div class="col-md-2">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="party_id" class="form-label">Party Name</label>
                <select id="party_id" name="party_id" class="form-control">
                    <?php while ($party = $parties->fetch_assoc()): ?>
                        <option value=<?php echo $party["partyID"] ?>><?php echo $party["partyName"] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="election_id" class="form-label">Election Name</label>
                <select id="election_id" name="election_id" class="form-control">
                    <?php while ($election = $elections->fetch_assoc()): ?>
                        <option value=<?php echo $election["electionID"] ?>><?php echo $election["electionName"] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="constituency_id" class="form-label">Constituency Name</label>
                <select id="constituency_id" name="constituency_id" class="form-control">
                    <?php while ($constituency = $constituencies->fetch_assoc()): ?>
                        <option value=<?php echo $constituency["constituencyID"] ?>><?php echo $constituency["constituencyName"] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end" style="margin-top:25px">
                <button type="submit" name="add" class="btn btn-primary w-100">Add Candidate</button>
            </div>
        </div>
    </form>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Candidates ID</th>
                <th scope="col">Candidates Name</th>
                <th scope="col">Party Name</th>
                <th scope="col">Election Name</th>
                <th scope="col">Constituency Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($candidate = $candidates->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($candidate["candidateID"]); ?></td>
                    <td><?php echo htmlspecialchars(sprintf("%s %s", $candidate["firstName"], $candidate["lastName"])); ?>
                    </td>
                    <td><?php echo htmlspecialchars($candidate["partyName"]); ?></td>
                    <td><?php echo htmlspecialchars($candidate["electionName"]); ?></td>
                    <td><?php echo htmlspecialchars($candidate["constituencyName"]); ?></td>
                    <td><a href=<?php echo "/candidate/delete_candidate.php?candidate_id={$candidate['candidateID']}" ?>>delete</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Footer section  -->
<?php include("footer.php") ?>
<?php $conn->close(); ?>