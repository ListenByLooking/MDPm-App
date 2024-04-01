<?php
// Check if description is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["description"])) {
    // Get the most recent DPO ID from the dpos table
    $host = 'localhost';
    $dbname = 'music';
    $username = 'root';
    $password = 'Database@123';
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->query("SELECT id FROM dpos ORDER BY created_at DESC LIMIT 1");
        $dpo_id = $stmt->fetchColumn();

        // Insert the description along with the most recent DPO ID into the score table
        $description = $_POST["description"];
        $stmt = $conn->prepare("INSERT INTO score (dpo_id, description) VALUES (:dpo_id, :description)");
        $stmt->bindParam(':dpo_id', $dpo_id);
        $stmt->bindParam(':description', $description);
        $stmt->execute();

        echo "Description added successfully!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
