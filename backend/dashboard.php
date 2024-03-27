<?php
// Fetch the latest DPO details from the database
$host = 'localhost';
$dbname = 'music';
$username = 'root';
$password = 'Database@123';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch the latest DPO
    $stmt = $conn->query("SELECT * FROM dpos ORDER BY id DESC LIMIT 1");
    $latest_dpo = $stmt->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?php echo $latest_dpo['title']; ?></title>
    <!-- Include your CSS and any other necessary stylesheets here -->
</head>
<body>
<!-- Display DPO content -->
<h1><?php echo $latest_dpo['title']; ?></h1>
<p><?php echo $latest_dpo['description']; ?></p>
<p>Author: <?php echo $latest_dpo['author']; ?></p>

<!-- Include any additional content or functionality here -->
</body>
</html>

