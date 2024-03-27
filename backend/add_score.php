<?php
// Connect to the database (replace these variables with your actual database credentials)
$host = 'localhost';
$dbname = 'music';
$username = 'root';
$password = 'Database@123';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Insert Score into the database
$dpo_id = $_POST['dpo_id'];
$score = $_POST['score'];

$sql = "INSERT INTO scores (dpo_id, score) VALUES (:dpo_id, :score)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':dpo_id', $dpo_id);
$stmt->bindParam(':score', $score);

if ($stmt->execute()) {
    echo "Score added successfully.";
} else {
    echo "Error adding score.";
}
?>
