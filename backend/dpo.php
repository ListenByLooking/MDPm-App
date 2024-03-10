<?php
// Connect to your database using mysqli
$servername = "localhost";
$username = "root";
$password = "root";
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
$latestDPOId = $row["max_id"]+1;

if (!isset($latestDPOId)) {
    // Handle case where $latestDPOId is not set
    exit("Error: DPO ID not found.");
}
// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected DPO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>You have selected the DPO <?php echo ($latestDPOId + 1); ?></h1>
    </header>
    <main>
        <div class="container">
            <button>Component</button>
            <button>Score</button>
            <button>Documentation</button>
        </div>
        <div class="container">
            <a href="component_buttons.php?component_id=<?php echo $latestDPOId + 1; ?>">Component</a>
        </div>
    </main>
</body>
</html>
