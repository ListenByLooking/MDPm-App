<?php
// Connect to the database (replace these variables with your actual database credentials)
$host = 'localhost';
$dbname = 'music';
$username = 'root';
$password = 'Database@123';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Insert Documentation into the database
$dpo_id = $_POST['dpo_id'];
$photos = $_POST['photos'];
$audio_visual = $_POST['audio_visual'];
$interviews = $_POST['interviews'];
$docs = $_POST['docs'];

$sql = "INSERT INTO documentation (dpo_id, photos, audio_visual, interviews, docs) VALUES (:dpo_id, :photos, :audio_visual, :interviews, :docs)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':dpo_id', $dpo_id);
$stmt->bindParam(':photos', $photos);
$stmt->bindParam(':audio_visual', $audio_visual);
$stmt->bindParam(':interviews', $interviews);
$stmt->bindParam(':docs', $docs);

if ($stmt->execute()) {
    echo "Documentation added successfully.";
} else {
    echo "Error adding documentation.";
}
?>
