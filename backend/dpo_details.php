<!DOCTYPE html>
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
            width: auto; /* Change width to auto to adjust based on content */
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
    <p><?php echo htmlspecialchars($_GET[title]); ?></p>
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
    if (isset($_GET['id'])) {
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
            if ($result) {
                // Display DPO details
                echo "<h1>DPO Details</h1>";
                echo "<p>Title: " . htmlspecialchars($result['title']) . "</p>";
                echo "<p>Description: " . htmlspecialchars($result['description']) . "</p>";
                echo "<p>Author: " . htmlspecialchars($result['author']) . "</p>";
                echo "<p>Created Date: " . htmlspecialchars($result['created_at']) . "</p>";
            } else {
                //echo "DPO not found.";
            }
        } catch (PDOException $e) {
            //echo "Error: " . $e->getMessage();
        }
    } else {
        //echo "Invalid request.";
    }
    ?>
    <div class="button-container">
        <button id="dpo1">DPO1</button>
        <button id="addDPO" onclick="window.location.href='add_dpo.php';">+</button>
    </div>
    <div id="detailsForm"></div>
</main>
<footer>
    <!-- Footer content -->
    <p>&copy; <?php echo date("Y"); ?> Multimedia Arts. All rights reserved.</p>
</footer>

<script>
    document.getElementById("dpo1").addEventListener("click", function() {
        var dpo_id = "<?php echo $dpo_id; ?>";

        fetch("fetch_dpo_details.php?id=" + dpo_id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var form = "<h2>Fetched Data</h2>";
                    form += "<form>";

                    // Assuming data.items is an array of objects
                    data.items.forEach(item => {
                        form += "<h3>Table: " + item.table + "</h3>";
                        for (var key in item.data) {
                            form += "<label>" + key + ": </label>";
                            form += "<input type='text' value='" + item.data[key] + "' readonly><br>";
                        }
                    });

                    form += "</form>";
                    document.getElementById("detailsForm").innerHTML = form;
                } else {
                    document.getElementById("detailsForm").innerHTML = "<p>No matching records found.</p>";
                }
            })
            .catch(error => console.error('Error fetching DPO details:', error));
    });
</script>
</body>
</html>