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

// Get the component ID from the URL parameter
$component_id = $_GET['component_id'];

// Fetch the buttons associated with the component ID
$sql = "SELECT button_name FROM component_buttons WHERE component_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $component_id);
$stmt->execute();
$result = $stmt->get_result();

// Close prepared statement
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Component Buttons</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Component Buttons</h1>
    </header>
    <main>
        <div class="container">
            <?php
            // Display buttons
            while ($row = $result->fetch_assoc()) {
                echo "<button>" . $row['button_name'] . "</button>";
            }
            ?>
        </div>
    </main>
</body>
</html>
