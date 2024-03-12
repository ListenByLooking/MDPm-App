<?php
// Retrieve DPO ID from URL parameter
$dpo_id = $_GET['id'];

// Save information to hardware_info table
$main_info = "You have selected main ($dpo_id)";
$communication_info = "You have selected communication ($dpo_id)";

// Connect to the database and insert the information
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "multimedia_arts";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO hardware_info (id, main_info, communication_info) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $dpo_id, $main_info, $communication_info);
$stmt->execute();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hardware Info</title>
</head>
<body>
    <h1>Hardware Info</h1>
    <p><?php echo $main_info; ?></p>
    <p><?php echo $communication_info; ?></p>
</body>
</html>
