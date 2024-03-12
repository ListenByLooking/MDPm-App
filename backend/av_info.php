<?php
// Retrieve DPO ID from URL parameter
$dpo_id = $_GET['id'];

// Save information to av_info table
$av_info = "You have selected a/v ($dpo_id)";

// Connect to the database and insert the information
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "multimedia_arts";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO av_info (id, av_info) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $dpo_id, $av_info);
$stmt->execute();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A/V Info</title>
</head>
<body>
    <h1>A/V Info</h1>
    <p><?php echo $av_info; ?></p>
</body>
</html>
