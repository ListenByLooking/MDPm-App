<?php
// Establish database connection (replace these variables with your own)
$host = 'localhost';
$dbname = 'music';
$username = 'root';
$password = 'Database@123';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Exit script if connection fails
}

try {
    // Get the last inserted ID from the dpos table
    $stmt = $conn->query("SELECT MAX(id) AS last_id FROM dpos");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $lastInsertId = $row['last_id'];

    // Get form data
    $id = $_POST['id'];
    $preservation_signature = $_POST['preservation_signature'];
    $original_signature = $_POST['original_signature'];
    $brand = $_POST['brand'];
    $brand_of_box = $_POST['brand_of_box'];
    $rpm = $_POST['rpm'];
    $stylus = $_POST['stylus'];
    $eq = $_POST['eq'];
    $type_of_recording = isset($_POST['type_of_recording']) ? $_POST['type_of_recording'] : '';
    $incisions = isset($_POST['incisions']) ? $_POST['incisions'] : '';
    $notes = $_POST['notes'];

    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO phonographicdisks (dpo_id, id, preservation_signature, original_signature, brand, brand_of_box, rpm, stylus, eq, type_of_recording, incisions, notes) 
            VALUES (:dpo_id, :id, :preservation_signature, :original_signature, :brand, :brand_of_box, :rpm, :stylus, :eq, :type_of_recording, :incisions, :notes)";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':dpo_id', $lastInsertId);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':preservation_signature', $preservation_signature);
    $stmt->bindParam(':original_signature', $original_signature);
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':brand_of_box', $brand_of_box);
    $stmt->bindParam(':rpm', $rpm);
    $stmt->bindParam(':stylus', $stylus);
    $stmt->bindParam(':eq', $eq);
    $stmt->bindParam(':type_of_recording', $type_of_recording);
    $stmt->bindParam(':incisions', $incisions);
    $stmt->bindParam(':notes', $notes);

    // Execute SQL statement
    $stmt->execute();

    echo "Form submitted successfully!";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close database connection
$conn = null;
?>
