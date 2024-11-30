<?php
function get_connection(): bool|mysqli
{
    $conn = mysqli_connect(getenv("DATABASE_HOSTNAME"), getenv("DATABASE_USERNAME"), getenv("DATABASE_PASSWORD"), getenv("DATABASE_NAME"));
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
// User
function add_user($conn): void
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    $sql = 'Insert into users(firstName, lastName, address, username, password, mobile, email)' . " values('$first_name', '$last_name', '$address', '$username', '$password', '$mobile', '$email')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// elections
function add_election($conn)
{
    $name = $_POST['name'];
    $election_type = $_POST['election_type'];
    $state_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT into elections (electionName, electionType, startDate, endDate) values
    (
        '$name',
        '$election_type',
        '$state_date',
        '$end_date'
    )";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function delete_election($conn, $election_id)
{
    $sql = "delete from elections where electionID = $election_id";
    if ($conn->query($sql) === TRUE) {
        echo "record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
function fetch_current_elections($conn): mysqli_result
{
    $sql = "SELECT *, ROW_NUMBER() OVER (ORDER BY startDate) AS rowNumber FROM elections where endDate > current_date() and startDate < current_date();";
    return $conn->query($sql);
}
function fetch_future_elections($conn): mysqli_result
{
    $sql = "SELECT *, ROW_NUMBER() OVER (ORDER BY startDate) AS rowNumber FROM elections where startDate > current_date();";
    return $conn->query($sql);
}
function fetch_completed_elections($conn): mysqli_result
{
    $sql = "SELECT *, ROW_NUMBER() OVER (ORDER BY startDate) AS rowNumber FROM elections where endDate < current_date();";
    return $conn->query($sql);
}
function get_elections($conn): mysqli_result
{
    $sql = "SELECT *, ROW_NUMBER() OVER (ORDER BY startDate) AS rowNumber FROM elections;";
    return $conn->query($sql);
}
function fetch_election($conn, $id): array
{
    $sql = "SELECT * FROM elections where electionID = $id;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}
function fetch_all_voters($conn): mysqli_result
{
    $sql = "select * from voters;";
    return $conn->query($sql);
}

// parties
function fetch_all_parties($conn): mysqli_result
{
    $sql = "SELECT * FROM parties;";
    return $conn->query($sql);
}
function add_party($conn)
{
    $name = $_POST['name'];
    $symbol = $_POST['symbol'];
    $leader_name = $_POST['leader_name'];
    $founded_year = $_POST['founded_year'];

    $sql = "INSERT INTO parties (partyName, partySymbol, leaderName, foundedYear) 
    VALUES ('$name', '$symbol', '$leader_name', '$founded_year')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function delete_party($conn, $party_id)
{
    $sql = "delete from parties where partyID = $party_id;";
    if ($conn->query($sql) === TRUE) {
        echo "record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// constituencies
function fetch_all_constituencies($conn): mysqli_result
{
    $sql = "SELECT * FROM constituencies;";
    return $conn->query($sql);
}
function add_constituency($conn)
{
    $name = $_POST['name'];
    $state = $_POST['state'];
    $type = $_POST['type'];

    $sql = "INSERT into constituencies (constituencyName, state, Type) VALUES
  ('$name', '$state', '$type')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function delete_constituency($conn, $constituency_id)
{
    $sql = "delete from constituencies where constituencyID = $constituency_id;";
    if ($conn->query($sql) === TRUE) {
        echo "record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// candidates
function fetch_candidates($conn, $election_id, $constituency_id): mysqli_result
{
    $sql = "select *, ROW_NUMBER() OVER (ORDER BY candidateID) AS rowNumber from candidates join constituencies on constituencies.constituencyID = candidates.constituencyID join parties on parties.partyID = candidates.partyID where electionID = '$election_id' and constituencies.constituencyID = '$constituency_id';";
    return $conn->query($sql);
}
function fetch_all_candidates($conn): mysqli_result
{
    $sql = "select * from candidates join constituencies on constituencies.constituencyID = candidates.constituencyID join parties on parties.partyID = candidates.partyID join elections on elections.electionID = candidates.electionID;";
    return $conn->query($sql);
}
function add_candidate($conn)
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $election_id = $_POST['election_id'];
    $party_id = $_POST['party_id'];
    $constituency_id = $_POST['constituency_id'];

    $sql = "INSERT into
            candidates (
                firstName,
                lastName,
                partyID,
                constituencyID,
                electionID
            ) values ('$first_name', '$last_name', $party_id, $constituency_id, $election_id);";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function delete_candidate($conn, $candidate_id)
{
    $sql = "delete from candidates where candidateID = $candidate_id;";
    if ($conn->query($sql) === TRUE) {
        echo "record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Voters profile
function fetch_profile($conn, $user_id): array
{
    $sql = "select * from voters where userID = '$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $profile = $result->fetch_assoc();
        return array(
            'email' => $_SESSION['email'],
            "first_name" => $profile["firstName"],
            "last_name" => $profile["lastName"],
            "gender" => $profile["gender"],
            "dob" => $profile["dob"],
            "address1" => $profile["address1"],
            "address2" => $profile["address2"],
            "state" => $profile["state"],
            "zip" => $profile["zip"],
            "voter_id" => $profile["voterIDCard"],
            "aadhar_number" => $profile["aadhaarNumber"],
            "constituency_id" => $profile["constituencyID"],
            "city" => $profile["city"],
            "id" => $profile["voterID"],
        );
    } else {
        return array();
    }
}
function get_profile($conn, $user_id): array|null
{
    $sql = "select * from voters where userID = '$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $profile = $result->fetch_assoc();
        return $profile;
    } else {
        return null;
    }
    ;
}
function add_profile($conn, $user_id)
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $aadhar_number = $_POST['aadhar_number'];
    $voter_id = $_POST['voter_id'];
    $constituency_id = $_POST['constituency_id'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    $sql = "INSERT into
        voters (
            userID,
            firstName,
            lastName,
            gender,
            dob,
            address1,
            address2,
            city,
            state,
            zip,
            constituencyID,
            aadhaarNumber,
            voterIDCard
        )
        values
        (
            '$user_id',
            '$first_name',
            '$last_name',
            '$gender',
            '$dob',
            '$address1',
            '$address2',
            '$city',
            '$state',
            '$zip',
            '$constituency_id',
            '$aadhar_number',
            '$voter_id'
        );";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function update_profile($conn, $voter_id): void
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $aadhar_number = $_POST['aadhar_number'];
    $voterIDCard = $_POST['voter_id'];
    $constituency_id = $_POST['constituency_id'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    $sql = "
        update voters 
        set firstName = '$first_name',
        lastName = '$last_name',
        gender = '$gender',
        dob = '$dob',
        address1 = '$address1',
        address2 = '$address2',
        city = '$city',
        state = '$state',
        zip = '$zip',
        constituencyID = '$constituency_id',
        aadhaarNumber = '$aadhar_number',
        voterIDCard = '$voterIDCard'
        where voterID = '$voter_id';";

    if ($conn->query($sql) === TRUE) {
        echo "record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// votes
function fetch_votes($conn, $candidate_id, $election_id): array
{
    $sql = "select count(*) as total_votes from votes where candidateID = $candidate_id and electionID = $election_id;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}
function submit_vote($conn, $election_id, $voter_id, $constituency_id)
{
    $sql = "INSERT into votes (electionID, voterID, candidateID) values ('$election_id', '$voter_id', '$constituency_id')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// election result
function get_results($conn, $id): mysqli_result
{
    $sql = "SELECT
  c.constituencyID,
  cons.constituencyName,
  c.candidateID,
  p.partyName,
  CONCAT(c.firstName, ' ', c.lastName) AS candidateName,
  MAX(votes.totalVotes) AS votes
FROM
  (
    SELECT
      candidateID,
      COUNT(voteID) AS totalVotes
    FROM
      votes
    WHERE
      electionID = $id
    GROUP BY
      candidateID
  ) votes
  JOIN candidates c ON votes.candidateID = c.candidateID
  JOIN constituencies cons ON c.constituencyID = cons.constituencyID
  JOIN parties p on p.partyID = c.partyID
GROUP BY c.constituencyID, c.candidateID;";
    return $conn->query($sql);
}
?>