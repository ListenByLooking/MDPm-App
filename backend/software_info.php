<?php
// Retrieve DPO ID from URL parameter
$dpo_id = $_GET['id'];

// Save information to software_info table
$source_info = "You have selected source ($dpo_id)";
$software_app_info = "You have selected software app ($dpo_id)";
$utilities_info = "You have selected utilities ($dpo_id)";

// Connect to the database and insert the information
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "multimedia_arts";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO software_info (id, source_info, software_app_info, utilities_info) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $dpo_id, $source_info, $software_app_info, $utilities_info);
$stmt->execute();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Info</title>
</head>
<body>
    <h1>Software Info</h1>
    <p><?php echo $source_info; ?></p>
    <p><?php echo $software_app_info; ?></p>
    <p><?php echo $utilities_info; ?></p>
</body>
</html>
