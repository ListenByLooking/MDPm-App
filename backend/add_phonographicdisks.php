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
}

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
$sql = "INSERT INTO phonographicdisks (id, preservation_signature, original_signature, brand, brand_of_box, rpm, stylus, eq, type_of_recording, incisions, notes) 
        VALUES ('$id', '$preservation_signature', '$original_signature', '$brand', '$brand_of_box', '$rpm', '$stylus', '$eq', '$type_of_recording', '$incisions', '$notes')";

try {
    // Execute SQL statement
    $conn->exec($sql);
    echo "Form submitted successfully!";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close database connection
$conn = null;
?>
