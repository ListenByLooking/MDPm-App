<?php
// Establish database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "Database@123";
$dbname = "music";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO digital_copy (signature, format, original_item, codec, bitrate, bitdepth_audio, bitdepth_video, resolution, aspect_ratio, frame_rate, sample_frequency, acquisition_device, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssss", $signature, $format, $original_item, $codec, $bitrate, $bitdepth_audio, $bitdepth_video, $resolution, $aspect_ratio, $frame_rate, $sample_frequency, $acquisition_device, $notes);

// Set parameters and execute the statement
$signature = $_POST["signature"];
$format = $_POST["format"];
$original_item = $_POST["original_item"];
$codec = $_POST["codec"];
$bitrate = $_POST["bitrate"];
$bitdepth_audio = $_POST["bitdepth_audio"];
$bitdepth_video = $_POST["bitdepth_video"];
$resolution = $_POST["resolution"];
$aspect_ratio = $_POST["aspect_ratio"];
$frame_rate = $_POST["frame_rate"];
$sample_frequency = $_POST["sample_frequency"];
$acquisition_device = $_POST["acquisition_device"];
$notes = $_POST["notes"];

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>