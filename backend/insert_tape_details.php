<?php
// Establish database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "Database@123";
$dbname = "music";

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO tape_details (preservation_signature, original_signature, brand_of_tape, brand_of_box, brand_of_carter, material_of_carter, diameter_of_carter, tape_width, num_of_sides, num_of_channels_sideA, channels_config_sideA, speed_sideA, num_of_channels_sideB, channels_config_sideB, speed_sideB, eq, notes) VALUES (:preservation_signature, :original_signature, :brand_of_tape, :brand_of_box, :brand_of_carter, :material_of_carter, :diameter_of_carter, :tape_width, :num_of_sides, :num_of_channels_sideA, :channels_config_sideA, :speed_sideA, :num_of_channels_sideB, :channels_config_sideB, :speed_sideB, :eq, :notes)");

    // Set parameters and execute the statement
    $stmt->bindParam(':preservation_signature', $_POST["preservation_signature"]);
    $stmt->bindParam(':original_signature', $_POST["original_signature"]);
    $stmt->bindParam(':brand_of_tape', $_POST["brand_of_tape"]);
    $stmt->bindParam(':brand_of_box', $_POST["brand_of_box"]);
    $stmt->bindParam(':brand_of_carter', $_POST["brand_of_carter"]);
    $stmt->bindParam(':material_of_carter', $_POST["material_of_carter"]);
    $stmt->bindParam(':diameter_of_carter', $_POST["diameter_of_carter"]);
    $stmt->bindParam(':tape_width', $_POST["tape_width"]);
    $stmt->bindParam(':num_of_sides', $_POST["num_of_sides"]);
    $stmt->bindParam(':num_of_channels_sideA', $_POST["num_of_channels_sideA"]);
    $stmt->bindParam(':channels_config_sideA', $_POST["channels_config_sideA"]);
    $stmt->bindParam(':speed_sideA', $_POST["speed_sideA"]);
    $stmt->bindParam(':num_of_channels_sideB', $_POST["num_of_channels_sideB"]);
    $stmt->bindParam(':channels_config_sideB', $_POST["channels_config_sideB"]);
    $stmt->bindParam(':speed_sideB', $_POST["speed_sideB"]);
    $stmt->bindParam(':eq', $_POST["eq"]);
    $stmt->bindParam(':notes', $_POST["notes"]);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: Could not insert data.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>