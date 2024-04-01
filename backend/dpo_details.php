<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Added DPO</title>
    <!-- Include your CSS file -->
    <style>
        /* Additional CSS styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: blue; /* Changed header background color to blue */
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            display: flex;
            align-items: center;
        }
        .logo img {
            margin-right: 10px;
            height: 30px;
            width: auto;
        }
        .logo-text {
            text-decoration: none;
            color: #fff;
        }
        .logo-text:hover {
            text-decoration: none;
            color: #ddd;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: right;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        nav ul li a {
            color: orange; /* Changed button color to orange */
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            background-color: darkgreen;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: #777;
        }

        main {
            padding: 20px;
            display: flex;
            justify-content: left;
            align-items: left;
            flex-direction: column;
        }

        footer {
            position: fixed; /* Fixed position to stick to the bottom */
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding-top: inherit;
            padding-bottom: inherit;
        }
       button {
            width: 20%; /* Change width to auto to adjust based on content */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: orange;
            color: white;
            cursor: pointer;
            margin-top: 10px;
            margin-right: 10px;
            margin-bottom: 30px;
            transition: background-color 0.3s, transform 0.3s;
            display: inline-block; /* Change display to inline-block */
            padding-bottom: 10px;
        }

        button:hover {
            background-color: darkorange;
            transform: translateY(-2px);
        }

        /* Style for container holding the buttons */
        .button-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header>
    <!-- Header content -->
    <a href="#" class="logo">
        <img src="logo.svg" alt="Logo">
        <span class="logo-text">Multimedia Arts</span>
    </a>
    <p><?php echo htmlspecialchars($_GET['title']); ?></p>
    <nav>
        <ul>
            <li><a href="artworks.php">Artworks</a></li>
            <!--<li><a href="#">Dashboard</a></li>-->
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
<main>
<?php
// Check if the ID parameter is set in the URL
if(isset($_GET['id'])) {
    $dpo_id = $_GET['id'];

    // Database connection details
    $host = 'localhost';
    $dbname = 'music';
    $username = 'root';
    $password = 'Database@123';

    try {
        // Connect to the database
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL query to fetch DPO details by ID
        $stmt = $conn->prepare("SELECT title, description, author, created_at FROM dpos WHERE id = :id");
        $stmt->bindParam(':id', $dpo_id);
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a record was found
        if($result) {
            // Display DPO details
            echo "<h1>DPO Details</h1>";
            echo "<p>Title: " . htmlspecialchars($result['title']) . "</p>";
            echo "<p>Description: " . htmlspecialchars($result['description']) . "</p>";
            echo "<p>Author: " . htmlspecialchars($result['author']) . "</p>";
            echo "<p>Created Date: " . htmlspecialchars($result['created_at']) . "</p>";

            // Display buttons for component, score, and documentation
            echo "<button id='componentBtn'>Component</button>";
            echo "<button id='scoreBtn'>Score</button>";
            echo "<button id='documentationBtn'>Documentation</button>";

            // Additional buttons functionality
            echo "<div id='subButtons'></div>";

            // JavaScript for button functionality
            echo "<script>";
            echo "document.addEventListener('click', function(event) {";
            echo "var target = event.target;";
            echo "if (target.matches('#componentBtn')) {";
            echo "document.getElementById('subButtons').innerHTML = '<button id=\"hardwareBtn\">Hardware</button> <button id=\"softwareBtn\">Software</button> <button id=\"audiovisualBtn\">Audiovisual</button> <button id=\"variousBtn\">Various</button>';";
            echo "} else if (target.matches('#audiovisualBtn')) {";
            echo "document.getElementById('subButtons').innerHTML = '<button id=\"audiocassetteBtn\">Audiocassette</button> <button id=\"phonographicdisksBtn\">Phonographicdisks</button> <button id=\"datBtn\">Dat</button> <button id=\"openreeltapeBtn\">Openreeltape</button>';";
            echo "} else if (target.matches('#audiocassetteBtn')) {";
            echo "window.location.href = 'audiocassette_details.php?id=$dpo_id';";
            echo "} else if (target.matches('#phonographicdisksBtn')) {";
            echo "window.location.href = 'phonographicdisks_details.php?id=$dpo_id';";
            echo "} else if (target.matches('#datBtn')) {";
            echo "window.location.href = 'dat_details.php?id=$dpo_id';";
            echo "} else if (target.matches('#openreeltapeBtn')) {";
            echo "window.location.href = 'openreeltape_details.php?id=$dpo_id';";
            echo "}";
            echo "});";
            echo "</script>";
        } else {
            echo "DPO not found.";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
    </main>
    <footer>
    <!-- Footer content -->
    <p>&copy; <?php echo date("Y"); ?> Multimedia Arts. All rights reserved.</p>
</footer>
    </body>
</html>
