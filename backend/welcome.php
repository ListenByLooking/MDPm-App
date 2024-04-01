<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        /* Existing CSS styles */
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

        .welcome-message {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            animation: fadeInDown 1s ease;
            text-align: center;
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

        /* New styles for menu options */
         .menu-button {
            margin-right: 1200px; /* Adjusted margin to move the button to the left */
            cursor: pointer; /* Added cursor pointer to indicate clickable */
        }
        .menu-options {
            display: none; /* Hide the menu options by default */
            position: absolute;
            top: 50px; /* Adjust the top position as needed */
            left: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            z-index: 1; /* Ensure menu options are displayed above other content */
        }

        .menu-options a {
            display: block;
            margin-bottom: 10px;
            color: #333;
            text-decoration: none;
        }

        .menu-options a:hover {
            text-decoration: underline;
        }

        /* Adjustments for recent titles */
        .recent-titles {
            display: none; /* Hide recent titles by default */
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
            margin-top: 20px;
        }

        /* Additional styles */
        .add-artworks-button {
            margin-top: 20px;
            background-color: darkblue;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        #addDPOForm {
            display: none; /* Hide the form by default */
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #addDPOForm label {
            display: block;
            margin-bottom: 10px;
        }

        #addDPOForm input[type="text"],
        #addDPOForm textarea,
        #addDPOForm input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #addDPOForm button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: orange;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
    <!-- Header content -->
    <div class="logo">
        <img src="logo.svg" alt="Logo">
        <span class="logo-text">Multimedia Arts</span>
    </div>
    
    <nav>
        <ul>
            <li><a href="artworks.php">Artworks</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
<main>
    <div class="menu-button" onclick="toggleMenu()">&#9776;</div>
    <!-- Menu options -->
    <div class="menu-options" id="menuOptions">
        <a href="#">Dashboard</a>
        <a href="#" onclick="showRecentTitles()">Title</a>
        <!-- Recent titles -->
        <div class="recent-titles" id="recentTitles">
            <h2>Recent Titles</h2>
            <ul>
                <?php
                // Fetch and display 10 recent titles from the dpos table
                $host = 'localhost';
                $dbname = 'music';
                $username = 'root';
                $password = 'Database@123';
                try {
                    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $conn->query("SELECT title FROM dpos ORDER BY created_at DESC LIMIT 10");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li>" . htmlspecialchars($row['title']) . "</li>";
                    }
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- Welcome message -->
    <h2 class="welcome-message">Welcome to Multimedia Arts - Preservation and Reactivation of Multimedia Artworks</h2>
    <!-- Add Artworks button and form -->
    <button class="add-artworks-button" id="addDPO">Add Artworks</button>
    <div id="addDPOForm">
        <form action="add_dpo.php" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
            
            <label for="year">Year:</label>
            <input type="date" id="year" name="year" required>
            
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
            
            <button type="submit">Add</button>
        </form>
    </div>
</main>
<footer>
    <!-- Footer content -->
    <p>&copy; <?php echo date("Y"); ?> Multimedia Arts. All rights reserved.</p>
</footer>
<script>
    // Function to toggle menu options visibility
    function toggleMenu() {
        var menuOptions = document.getElementById("menuOptions");
        if (menuOptions.style.display === "none" || menuOptions.style.display === "") {
            menuOptions.style.display = "block";
        } else {
            menuOptions.style.display = "none";
        }
    }

    // Function to show recent titles
    function showRecentTitles() {
        var recentTitles = document.getElementById("recentTitles");
        if (recentTitles.style.display === "none" || recentTitles.style.display === "") {
            recentTitles.style.display = "block";
        } else {
            recentTitles.style.display = "none";
        }
    }

    // Function to show/hide add DPO form
    document.getElementById("addDPO").addEventListener("click", function() {
        var addDPOForm = document.getElementById("addDPOForm");
        if (addDPOForm.style.display === "none" || addDPOForm.style.display === "") {
            addDPOForm.style.display = "block";
        } else {
            addDPOForm.style.display = "none";
        }
    });
</script>
</body>
</html>