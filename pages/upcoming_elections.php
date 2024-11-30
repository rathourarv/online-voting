<?php $current_elections = fetch_future_elections($conn); ?>
<div class="container">
    <h2>Upcoming Elections</h2>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Election Id</th>
                <th scope="col">Election Name</th>
                <th scope="col">Election Type</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($election = mysqli_fetch_assoc($current_elections)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($election["rowNumber"]); ?></td>
                    <td><?php echo htmlspecialchars($election["electionName"]); ?></td>
                    <td><?php echo htmlspecialchars($election["electionType"]); ?></td>
                    <td><?php echo htmlspecialchars($election["startDate"]); ?></td>
                    <td><?php echo htmlspecialchars($election["endDate"]); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>