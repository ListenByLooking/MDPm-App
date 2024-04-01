<?php
// Connect to the database (replace these variables with your actual database credentials)
$host = 'localhost';
$dbname = 'music';
$username = 'root';
$password = 'Database@123';

// Get form data
$title = $_POST['title'];
$description = $_POST['description'];
$author = $_POST['author'];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the last inserted ID from the dpos table
    $stmt = $conn->query("SELECT MAX(id) AS last_id FROM dpos");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $lastInsertId = $row['last_id'];

    // Insert into audiocassette table with the corresponding dpo_id
    $preservation_signature = $_POST['preservation_signature'];
    $original_signature = $_POST['original_signature'];
    $brand = $_POST['brand'];
    $brand_of_box = $_POST['brand_of_box'];
    $cassette_type = $_POST['cassette_type'];
    $noise_reduction = $_POST['noise_reduction'];
    $notes = $_POST['notes'];

    $stmt = $conn->prepare("INSERT INTO audiocassette (dpo_id, preservation_signature, original_signature, brand, brand_of_box, cassette_type, noise_reduction, notes) 
                            VALUES (:dpo_id, :preservation_signature, :original_signature, :brand, :brand_of_box, :cassette_type, :noise_reduction, :notes)");
    $stmt->bindParam(':dpo_id', $lastInsertId);
    $stmt->bindParam(':preservation_signature', $preservation_signature);
    $stmt->bindParam(':original_signature', $original_signature);
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':brand_of_box', $brand_of_box);
    $stmt->bindParam(':cassette_type', $cassette_type);
    $stmt->bindParam(':noise_reduction', $noise_reduction);
    $stmt->bindParam(':notes', $notes);
    $stmt->execute();

    echo "Audiocassette added successfully.";

    // Redirect to view_added_dpo.php with form data
    header("Location: view_added_dpo.php?title=" . urlencode($title) . "&description=" . urlencode($description) . "&author=" . urlencode($author));
    exit();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
