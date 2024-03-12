<?php
// Retrieve DPO ID and info from URL parameter
$dpo_id = $_GET['id'];
$dpo_info = $_GET['dpo_info'];

// Save information to score_info table
$score_info = "You have selected the Score of $dpo_info ($dpo_id)";

// Connect to the database and insert the information
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "multimedia_arts";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO score_info (id, score_info) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $dpo_id, $score_info);
$stmt->execute();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score Info</title>
</head>
<body>
    <h1>Score Info</h1>
    <p><?php echo $score_info; ?></p>
</body>
</html>
