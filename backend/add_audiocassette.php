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
$cassette_type = $_POST['cassette_type'];
$noise_reduction = isset($_POST['noise_reduction']) ? $_POST['noise_reduction'] : '';
$notes = $_POST['notes'];

// Prepare SQL statement to insert data into database using prepared statements
$sql = "INSERT INTO audiocassette (id, preservation_signature, original_signature, brand, brand_of_box, cassette_type, noise_reduction, notes) 
        VALUES (:id, :preservation_signature, :original_signature, :brand, :brand_of_box, :cassette_type, :noise_reduction, :notes)";

try {
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':preservation_signature', $preservation_signature);
    $stmt->bindParam(':original_signature', $original_signature);
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':brand_of_box', $brand_of_box);
    $stmt->bindParam(':cassette_type', $cassette_type);
    $stmt->bindParam(':noise_reduction', $noise_reduction);
    $stmt->bindParam(':notes', $notes);

    // Execute the statement
    $stmt->execute();

    echo "Form submitted successfully!";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close database connection
$conn = null;
?>
