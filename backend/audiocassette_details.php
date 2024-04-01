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
        $stmt = $conn->prepare("SELECT preservation_signature, original_signature, brand, brand_of_box, cassette_type, noise_reduction, notes FROM audiocassette WHERE dpo_id = :dpo_id");
        $stmt->bindParam(':dpo_id', $dpo_id);
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a record was found
        if($result) {
            // Display audiocassette details
            echo "<h1>Audiocassette Details</h1>";
            echo "<p>Preservation Signature: " . htmlspecialchars($result['preservation_signature']) . "</p>";
            echo "<p>Original Signature: " . htmlspecialchars($result['original_signature']) . "</p>";
            echo "<p>Brand: " . htmlspecialchars($result['brand']) . "</p>";
            echo "<p>Brand of Box: " . htmlspecialchars($result['brand_of_box']) . "</p>";
            echo "<p>Cassette Type: " . htmlspecialchars($result['cassette_type']) . "</p>";
            echo "<p>Noise Reduction: " . htmlspecialchars($result['noise_reduction']) . "</p>";
            echo "<p>Notes: " . htmlspecialchars($result['notes']) . "</p>";
        } else {
            echo "Audiocassette details not found.";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
