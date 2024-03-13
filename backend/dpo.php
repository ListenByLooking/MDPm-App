<?php
// Connect to your database using mysqli
global $dpo_info, $dpo_id;
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>You have selected the DPO <?php echo ($latestDPOId + 1); ?></h1>
    </header>
    <main>
        <div class="container">
            <button onclick="redirectToPage('component')">Component</button>
            <button onclick="redirectToPage('score')">Score</button>
            <button onclick="redirectToPage('documentation')">Documentation</button>
        </div>
    </main>
    <script>
        function redirectToPage(page) {
            if (page === 'component') {
                window.location.href = 'component_buttons.php';
            } else if (page === 'documentation') {
                window.location.href = 'documentation_buttons.php';
            } else if (page === 'score') {
                 window.location.href = 'score_info.php?id=<?php echo $dpo_id; ?>&dpo_info=<?php echo $dpo_info; ?>';
            }
        }
    </script>
</body>
</html>
