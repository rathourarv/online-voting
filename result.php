<?php
include("functions.php");
$conn = get_connection();
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$election = fetch_election($conn, $queries["id"]);
$results = get_results($conn, $queries["id"]);
?>

<!-- Header section  -->
<?php include("header.php") ?>

<!-- Main section  -->
<div class="container">
    <div>
        <div class="well col-xs-4">
            <h4>Election: <?php echo $election["electionName"]; ?></h4>
        </div>
        <div class="well col-xs-4">
            <h4>Election Type: <?php echo $election["electionType"]; ?></h4>
        </div>
        <div class="well col-xs-4">
            <h4>Result Date: <?php echo $election["endDate"]; ?></h4>
        </div>
    </div>
    
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Candidate Name</th>
                <th scope="col">Party Name</th>
                <th scope="col">Constituency Name</th>
                <th scope="col">Total Votes</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($result = $results->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($result["candidateName"]); ?></td>
                    <td><?php echo htmlspecialchars($result["partyName"]); ?></td>
                    <td><?php echo htmlspecialchars($result["constituencyName"]); ?></td>
                    <td><?php echo htmlspecialchars($result["votes"]); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Footer section  -->
<?php include("footer.php") ?>
<?php $conn->close(); ?>