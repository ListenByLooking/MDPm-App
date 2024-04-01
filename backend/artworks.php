<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multimedia Arts - Preservation and Reactivation of Multimedia Artworks</title>
    <!-- Your CSS styles here -->
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
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 800px;
            width: 100%;
            box-sizing: border-box;
        }

        .welcome-message {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            animation: fadeInDown 1s ease;
        }

        .dashboard {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
        }

        td {
            background-color: #fff;
        }

        .dpo-item {
            cursor: pointer; /* Add cursor pointer to indicate clickable */
            transition: transform 0.3s ease;
        }
        .dpo-item:hover {
            transform: translateY(-5px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        footer {
            position: fixed; /* Fixed position to stick to the bottom */
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding-bottom: inherit;
        }
        /* Add this CSS to your existing styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid skyblue;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
           background-color: #ddd;
        }

/* Adjust the height of the main content area to accommodate the footer */
        main {
          padding: 20px;
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
          min-height: calc(100vh - 150px); /* Adjust as needed */
        }



        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
    <div class="dashboard">
        <?php
        // Fetch and display list of DPOs
        $host = 'localhost';
        $dbname = 'music';
        $username = 'root';
        $password = 'Database@123';
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Fetch title, author, year, and description from the dpos table
            $stmt = $conn->query("SELECT id, title, author, year, description FROM dpos ORDER BY id DESC");
            echo "<table>";
            echo "<tr><th>Title</th><th>Author</th><th>Year</th><th>Description</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // Make each DPO title clickable and link it to dpo_details.php with the DPO ID as a parameter
    echo "<tr class='dpo-item' onclick='window.location=\"dpo_details.php?id={$row['id']}\"'>";
    echo "<td>{$row['title']}</td>";
    echo "<td>{$row['author']}</td>";
    echo "<td>{$row['year']}</td>";
    echo "<td>{$row['description']}</td>";
    echo "</tr>";
}

            echo "</table>";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>
</main>
<footer>
    <!-- Footer content -->
    <p>&copy; <?php echo date("Y"); ?> Multimedia Arts. All rights reserved.</p>
</footer>
</body>
</html>
