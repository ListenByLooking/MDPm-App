
<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'music';
$username = 'root';
$password = 'Database@123';

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare SQL statement
    $sql = "INSERT INTO preservation (
                preservation_signature,
                original_signature,
                type,
                format,
                generation,
                title,
                author,
                year,
                support_material,
                color_bw,
                sound,
                aspect_ratio,
                film_brand,
                carter_brand,
                carter_material,
                cover_material,
                cement_splices,
                restored_cs,
                tape_splices,
                restored_ts,
                restored_perforations,
                restored_frames,
                notes
            ) VALUES (
                :preservation_signature,
                :original_signature,
                :type,
                :format,
                :generation,
                :title,
                :author,
                :year,
                :support_material,
                :color_bw,
                :sound,
                :aspect_ratio,
                :film_brand,
                :carter_brand,
                :carter_material,
                :cover_material,
                :cement_splices,
                :restored_cs,
                :tape_splices,
                :restored_ts,
                :restored_perforations,
                :restored_frames,
                :notes
            )";

    // Prepare statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':preservation_signature', $_POST['preservation_signature']);
    $stmt->bindParam(':original_signature', $_POST['original_signature']);
    $stmt->bindParam(':type', $_POST['type']);
    $stmt->bindParam(':format', $_POST['format']);
    $stmt->bindParam(':generation', $_POST['generation']);
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':author', $_POST['author']);
    $stmt->bindParam(':year', $_POST['year']);
    $stmt->bindParam(':support_material', $_POST['support_material']);
    $stmt->bindParam(':color_bw', $_POST['color_bw']);
    $stmt->bindParam(':sound', $_POST['sound']);
    $stmt->bindParam(':aspect_ratio', $_POST['aspect_ratio']);
    $stmt->bindParam(':film_brand', $_POST['film_brand']);
    $stmt->bindParam(':carter_brand', $_POST['carter_brand']);
    $stmt->bindParam(':carter_material', $_POST['carter_material']);
    $stmt->bindParam(':cover_material', $_POST['cover_material']);
    $stmt->bindParam(':cement_splices', $_POST['cement_splices']);
    $stmt->bindParam(':restored_cs', $_POST['restored_cs']);
    $stmt->bindParam(':tape_splices', $_POST['tape_splices']);
    $stmt->bindParam(':restored_ts', $_POST['restored_ts']);
    $stmt->bindParam(':restored_perforations', $_POST['restored_perforations']);
    $stmt->bindParam(':restored_frames', $_POST['restored_frames']);
    $stmt->bindParam(':notes', $_POST['notes']);

    // Execute statement
    try {
        $stmt->execute();
        echo "Data inserted successfully.";
    } catch (PDOException $e) {
        die("Error: Could not insert data. " . $e->getMessage());
    }
}
?>