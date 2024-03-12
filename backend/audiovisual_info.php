<?php
// Retrieve DPO ID from URL parameter
$dpo_id = $_GET['id'];

// Save information to audiovisual_info table
$video_info = "You have selected Video ($dpo_id)";
$audio_info = "You have selected audio ($dpo_id)";
$photo_info = "You have selected photo ($dpo_id)";

// Connect to the database and insert the information
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "multimedia_arts";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO audiovisual_info (id, video_info, audio_info, photo_info) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $dpo_id, $video_info, $audio_info, $photo_info);
$stmt->execute();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiovisual Info</title>
</head>
<body>
    <h1>Audiovisual Info</h1>
    <p><?php echo $video_info; ?></p>
    <p><?php echo $audio_info; ?></p>
    <p><?php echo $photo_info; ?></p>
</body>
</html>
