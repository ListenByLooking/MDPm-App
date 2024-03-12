<?php
// Retrieve DPO ID from URL parameter
$dpo_id = $_GET['id'];

// Save information to photos_info table
$interview_info = "You have selected interview ($dpo_id)";

// Connect to the database and insert the information
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "multimedia_arts";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO interviews_info (id, interview_info) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $dpo_id, $interview_info);
$stmt->execute();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interviews Info</title>
</head>
<body>
    <h1>Interviews Info</h1>
    <p><?php echo $interview_info; ?></p>
</body>
</html>
