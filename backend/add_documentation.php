<?php
// Establish database connection
$db_host = 'localhost';
$db_name = 'music';
$db_user = 'root';
$db_pass = 'Database@123';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch the most recent dpo_id from the dpos table
    $stmt = $pdo->query("SELECT MAX(id) as max_id FROM dpos");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $dpo_id = $result['max_id'];

    // Retrieve form data
    $documentationDestination = $_POST['documentationDestination'];
    $url = $_POST[$documentationDestination . 'Url']; // Get URL based on the selected documentation type

    // Prepare the SQL statement based on the selected documentation type
    switch ($documentationDestination) {
        case 'photos':
            $stmt = $pdo->prepare("INSERT INTO documentation (dpo_id, photos_url) VALUES (:dpo_id, :url)");
            break;
        case 'interview':
            $stmt = $pdo->prepare("INSERT INTO documentation (dpo_id, interview_url) VALUES (:dpo_id, :url)");
            break;
        case 'av':
            $stmt = $pdo->prepare("INSERT INTO documentation (dpo_id, av_url) VALUES (:dpo_id, :url)");
            break;
        case 'docs':
            $stmt = $pdo->prepare("INSERT INTO documentation (dpo_id, docs_url) VALUES (:dpo_id, :url)");
            break;
        default:
            // Handle invalid documentation type
            break;
    }

    // Execute the SQL statement
    $stmt->execute(['dpo_id' => $dpo_id, 'url' => $url]);

    // Redirect to the previous page or wherever you want after successful insertion
    header("Location: documentation.php");
    exit();
} catch(PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
    exit();
}
?>
