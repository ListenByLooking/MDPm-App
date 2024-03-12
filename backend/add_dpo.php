<?php
// Connect to your database using mysqli
$servername = "localhost";
$username = "root";
$password = "Database@123";
$dbname = "multimedia_arts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest DPO ID
$result = $conn->query("SELECT MAX(id) as max_id FROM dpo_data");
$row = $result->fetch_assoc();
$nextId = $row["max_id"] + 1;

// Sample data, replace with actual data inputs
$dpo_info = "DPO" . $nextId;
$component = "Component data";
$score = "Score data";
$documentation = "Documentation data";

// Insert DPO information into the database
$sql = "INSERT INTO dpo_data (id, dpo_info, component, score, documentation) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $nextId, $dpo_info, $component, $score, $documentation);
$stmt->execute();

// Close prepared statement and database connection
$stmt->close();
$conn->close();

// Redirect back to index.php with success message
header("Location: index.php?success=1");
exit();
?>
