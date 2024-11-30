--
-- Database: `onlinevoting`
--
-- --------------------------------------------------------
-- Table structure for table `Users`
--
CREATE TABLE
  IF NOT EXISTS users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    address VARCHAR(200),
    userName VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(30) NOT NULL,
    mobile VARCHAR(15) NOT NULL
  );

--
-- Table structure for table `feedback`
--
CREATE TABLE
  IF NOT EXISTS feedback (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `fback` VARCHAR(10) NOT NULL,
    `textbox` VARCHAR(200) NOT NULL
  );

-- --------------------------------------------------------
--
-- Table structure for `elections`
--
CREATE TABLE
  IF NOT EXISTS elections (
    electionID INT PRIMARY KEY AUTO_INCREMENT,
    electionName VARCHAR(100), -- E.g., Lok Sabha 2024
    electionType ENUM ('LOK_SABHA', 'VIDHAN_SABHA', 'MUNICIPAL'),
    startDate DATE,
    endDate DATE
  );

-- --------------------------------------------------------
--
-- Table structure for `parties`
--
CREATE TABLE
  IF NOT EXISTS parties (
    partyName VARCHAR(100) UNIQUE,
    partyID INT PRIMARY KEY AUTO_INCREMENT,
    partySymbol VARCHAR(255), -- Path to the symbol image
    leaderName VARCHAR(100),
    foundedYear YEAR
  );

-- --------------------------------------------------------
--
-- Table structure for `Constituencies`
--
CREATE TABLE
  IF NOT EXISTS constituencies (
    constituencyID INT PRIMARY KEY AUTO_INCREMENT,
    constituencyName VARCHAR(100) UNIQUE,
    state VARCHAR(100),
    Type ENUM ('General', 'SC', 'ST') -- Reserved or General
  );

-- --------------------------------------------------------
--
-- Table structure for `candidates`
--
CREATE TABLE
  IF NOT EXISTS candidates (
    candidateID INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    partyID INT,
    constituencyID INT,
    electionID INT,
    FOREIGN KEY (partyID) REFERENCES parties (partyID),
    FOREIGN KEY (constituencyID) REFERENCES constituencies (constituencyID),
    FOREIGN KEY (electionID) REFERENCES elections (electionID)
  );

-- --------------------------------------------------------
--
-- Table structure for table `voters`
--
CREATE TABLE
  IF NOT EXISTS voters (
    voterID INT PRIMARY KEY AUTO_INCREMENT,
    userID INT,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    gender ENUM ('Male', 'Female', 'Other'),
    dob DATE,
    address1 VARCHAR(100),
    address2 VARCHAR(100),
    city VARCHAR(100),
    state VARCHAR(100),
    zip INT,
    constituencyID INT,
    aadhaarNumber VARCHAR(12) UNIQUE,
    voterIDCard VARCHAR(15) UNIQUE,
    FOREIGN KEY (constituencyID) REFERENCES constituencies (constituencyID),
    FOREIGN KEY (userID) REFERENCES users (userID)
  );

-- --------------------------------------------------------
--
-- Table structure for `votes`
--
CREATE TABLE
  IF NOT EXISTS votes (
    voteID INT PRIMARY KEY AUTO_INCREMENT,
    electionID INT,
    voterID INT,
    candidateID INT,
    voteTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (electionID) REFERENCES elections (electionID),
    FOREIGN KEY (voterID) REFERENCES voters (voterID),
    FOREIGN KEY (candidateID) REFERENCES candidates (candidateID),
    UNIQUE KEY uniq_votes (electionID, voterID)
  );

-- SELECT
--   c.constituencyID,
--   cons.constituencyName,
--   c.candidateID,
--   p.partyName,
--   CONCAT (c.firstName, ' ', c.lastName) AS candidateName,
--   MAX(votes.totalVotes) AS votes
-- FROM
--   (
--     SELECT
--       candidateID,
--       COUNT(voteID) AS totalVotes
--     FROM
--       votes
--     WHERE
--       electionID = 1
--     GROUP BY
--       candidateID
--   ) votes
--   JOIN candidates c ON votes.candidateID = c.candidateID
--   JOIN constituencies cons ON c.constituencyID = cons.constituencyID
--   JOIN parties p on p.partyID = c.partyID
-- GROUP BY
--   c.constituencyID,
--   c.candidateID;