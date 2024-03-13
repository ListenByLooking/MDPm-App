<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multimedia arts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Multimedia arts</h1>
        <img src="banner.jpg" alt="Music Banner" class="banner">
    </header>
    <main>
        <div class="container">
            <div class="column">
                <img src="image1.jpg" alt="Image 1">
                <p>Description 1</p>
                <button onclick="redirectToDPO('DPO1')">DPO1</button>
            </div>
            <div class="column">
                <img src="image2.jpg" alt="Image 2">
                <p>Description 2</p>
                <button onclick="redirectToDPO('DPO2')">DPO2</button>
            </div>
        </div>
        <button onclick="addDPO()">Add DPO</button>
        
        <?php
        // Connect to your database using mysqli
        $servername = "localhost";
        $username = "root";
        $password = "Database@123";
        $dbname = "multimedia_arts";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the latest DPO ID
        $result = $conn->query("SELECT MAX(id) as max_id FROM dpo_data");
        $row = $result->fetch_assoc();
        $latestDPOId = $row["max_id"];

        // Display the latest DPO ID dynamically
        if(isset($latestDPOId)) {
            echo "<p>You have selected the DPO " . ($latestDPOId + 1) . "</p>";
        }

        // Close database connection
        $conn->close();
        ?>
    </main>

    <script src="script.js"></script>
</body>
</html>
