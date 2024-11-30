<?php $current_elections = fetch_current_elections($conn); ?>
<div class="container">
    <h2>Current Elections</h2>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Election Id</th>
                <th scope="col">Election Name</th>
                <th scope="col">Election Type</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Vote</th>
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
                    <td><a href=<?php echo "/vote.php?election_id={$election['electionID']}" ?>>Vote</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>