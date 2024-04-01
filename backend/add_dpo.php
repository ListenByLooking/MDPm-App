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
$year = $_POST['year'];
$author = $_POST['author'];

// Prepare SQL statement with correct number of placeholders
$sql = "INSERT INTO dpos (title, description, year, author) VALUES (:title, :description, :year, :author)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':year', $year);
$stmt->bindParam(':author', $author);

if ($stmt->execute()) {
    echo "DPO added successfully.";
} else {
    echo "Error adding DPO.";
}

// Redirect to view_added_dpo.php after successful insertion
header("Location: view_added_dpo.php?title=" . urlencode($_POST['title']) . "&description=" . urlencode($_POST['description']) . "&year=" . urlencode($_POST['year']) . "&author=" . urlencode($_POST['author']));
exit();
?>
