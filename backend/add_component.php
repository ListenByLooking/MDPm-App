<?php
// Connect to the database (replace these variables with your actual database credentials)
$host = 'localhost';
$dbname = 'music';
$username = 'root';
$password = 'Database@123';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


// Insert Component into the database
$dpo_id = $_POST['dpo_id'];
$hardware = $_POST['hardware'];
$software = $_POST['software'];
$audio_visual = $_POST['audio_visual'];
$various = $_POST['various'];

$sql = "INSERT INTO components (dpo_id, hardware, software, audio_visual, various) VALUES (:dpo_id, :hardware, :software, :audio_visual, :various)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':dpo_id', $dpo_id);
$stmt->bindParam(':hardware', $hardware);
$stmt->bindParam(':software', $software);
$stmt->bindParam(':audio_visual', $audio_visual);
$stmt->bindParam(':various', $various);

if ($stmt->execute()) {
    echo "Component added successfully.";
} else {
    echo "Error adding component.";
}
?>
