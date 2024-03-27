<?php
// Connect to the database (replace these variables with your actual database credentials)
$host = 'localhost';
$dbname = 'music';
$username = 'root';
$password = 'Database@123';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Insert DPO into the database
$title = $_POST['title'];
$description = $_POST['description'];
$author = $_POST['author'];

$sql = "INSERT INTO dpos (title, description, author) VALUES (:title, :description, :author)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':author', $author);

if ($stmt->execute()) {
    echo "DPO added successfully.";
} else {
    echo "Error adding DPO.";
}
header("Location: index.php?message=success");
?>
