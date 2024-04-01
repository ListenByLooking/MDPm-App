<?php
// Establish database connection (replace these variables with your own)
$host = 'localhost';
$dbname = 'music';
$username = 'root';
$password = 'Database@123';

// Get form data
$id = $_POST['id'];
$preservation_signature = $_POST['preservation_signature'];
$original_signature = $_POST['original_signature'];
$brand = $_POST['brand'];
$brand_of_box = $_POST['brand_of_box'];
$samplerate = $_POST['samplerate'];
$notes = $_POST['notes'];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the last inserted ID from the dpos table
    $stmt = $conn->query("SELECT MAX(id) AS last_id FROM dpos");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $lastInsertId = $row['last_id'];

    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO dat (id, dpo_id, preservation_signature, original_signature, brand, brand_of_box, samplerate, notes) 
            VALUES ('$id', '$lastInsertId', '$preservation_signature', '$original_signature', '$brand', '$brand_of_box', '$samplerate', '$notes')";

    // Execute SQL statement
    $conn->exec($sql);
    echo "Form submitted successfully!";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close database connection
$conn = null;
?>
