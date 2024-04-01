<?php
// Check if the ID parameter is set in the URL
if(isset($_GET['id'])) {
    $dpo_id = $_GET['id'];

    // Database connection details
    $host = 'localhost';
    $dbname = 'music';
    $username = 'root';
    $password = 'Database@123';

    try {
        // Connect to the database
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL query to fetch audiocassette details by DPO ID
        $stmt = $conn->prepare("SELECT preservation_signature, original_signature, brand, brand_of_box, rpm, stylus, eq, type_of_recording, incisions, notes FROM phonographicdisks WHERE dpo_id = :dpo_id");
        $stmt->bindParam(':dpo_id', $dpo_id);
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a record was found
        if($result) {
            // Display audiocassette details
            echo "<h1>Phonographicdisks Details</h1>";
            echo "<p>Preservation Signature: " . htmlspecialchars($result['preservation_signature']) . "</p>";
            echo "<p>Original Signature: " . htmlspecialchars($result['original_signature']) . "</p>";
            echo "<p>Brand: " . htmlspecialchars($result['brand']) . "</p>";
            echo "<p>Brand of Box: " . htmlspecialchars($result['brand_of_box']) . "</p>";
            echo "<p>rpm: " . htmlspecialchars($result['rpm']) . "</p>";
            echo "<p>Stylus: " . htmlspecialchars($result['stylus']) . "</p>";
            echo "<p>eq: " . htmlspecialchars($result['eq']) . "</p>";
            echo "<p>Type of recording: " . htmlspecialchars($result['type_of_recording']) . "</p>";
            echo "<p>Incisions: " . htmlspecialchars($result['incisions']) . "</p>";
            echo "<p>Notes: " . htmlspecialchars($result['notes']) . "</p>";
        } else {
            echo "Phonographicdisks details not found.";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
