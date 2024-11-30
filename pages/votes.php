<!-- Main section -->
<div class="container">
    <h2>Candidates in your Constituency</h2>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Candidate ID</th>
                <th scope="col">Candidate Name</th>
                <th scope="col">Candidate Party Name</th>
                <th scope="col">Your Constituency Name</th>
                <th scope="col">Vote</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($candidate = $candidates->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($candidate["rowNumber"]); ?></td>
                    <td><?php echo htmlspecialchars(sprintf("%s %s", $candidate["firstName"], $candidate["lastName"])); ?></td>
                    <td><?php echo htmlspecialchars($candidate["partyName"]); ?></td>
                    <td><?php echo htmlspecialchars($candidate["constituencyName"]); ?></td>
                    <td><a href=<?php echo "/handlers/submit_vote.php?candidate_id={$candidate['candidateID']}&election_id={$queries['election_id']}&constituency_id={$profile['constituency_id']}" ?>>submit</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>