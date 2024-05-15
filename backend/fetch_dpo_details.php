<?php
header('Content-Type: application/json');

// Database connection details
$host = 'localhost';
$dbname = 'music';
$username = 'root';
$password = 'Database@123';

try {
    // Connect to the database
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the ID parameter is set in the URL
    if (isset($_GET['id'])) {
        $dpo_id = $_GET['id'];

        $tables = ['audiocassette', 'dat', 'documentation', 'phonographicdisks', 'score'];
        $data = [];

        foreach ($tables as $table) {
            $stmt = $conn->prepare("SELECT * FROM $table WHERE dpo_id = :dpo_id");
            $stmt->bindParam(':dpo_id', $dpo_id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $data[] = [
                    'table' => $table,
                    'data' => $result
                ];
            }
        }

        if (count($data) > 0) {
            echo json_encode(['success' => true, 'items' => $data]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>