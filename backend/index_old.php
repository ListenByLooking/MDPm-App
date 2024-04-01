<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multimedia Arts - Preservation and Reactivation of Multimedia Artworks</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Additional CSS styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
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
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            background-color: #555;
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
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .dpo-item {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px;
            border-radius: 8px;
            text-align: center;
            width: calc(33.33% - 20px);
            box-sizing: border-box;
            transition: transform 0.3s ease;
        }
        .dpo-item:hover {
            transform: translateY(-5px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .add-dpo-button {
            margin-top: 20px;
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
    <a href="#" class="logo">
        <img src="logo.svg" alt="Logo">
        <span class="logo-text">Multimedia Arts</span>
    </a>
    <nav>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
<main>
    <div class="container">
        <h1 class="welcome-message">Dashboard</h1>
        <!-- Dashboard -->
        <div class="dashboard">
            <?php
            // Fetch and display list of DPOs
            $host = 'localhost';
            $dbname = 'music';
            $username = 'root';
            $password = 'root';
            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->query("SELECT id FROM dpos ORDER BY id DESC");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='dpo-item'>";
                    echo "<p>DPO{$row['id']}</p>";
                    echo "</div>";
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </div>
        <div class="container">
            <h1 class="welcome-message">Preservation of Multimedia Artworks</h1>
            <!-- Display list of DPOs -->

            <!-- Display buttons after adding DPO -->
            <!--<?php if(isset($_GET['message']) && $_GET['message'] == 'success'): ?>
                <div class="message">
                    DPO is added successfully.
                    <br>
                    <a href="component.php"><button>Component</button></a>
                    <a href="score.php"><button>Score</button></a>
                    <a href="documentation.php"><button>Documentation</button></a><br>
                    <a href="index.php"><button>Back</button></a>
                </div>
            <?php endif; ?> -->
            <?php if(isset($_GET['message']) && $_GET['message'] == 'success'): ?>
    <div class="message">
        DPO is added successfully.
        <br>
        <form id="redirectForm" action="" method="GET">
            <select name="destination" id="destination">
                <option value="component">Component</option>
                <option value="score">Score</option>
                <option value="documentation">Documentation</option>
            </select>
            <button type="button" onclick="redirectToSelected()">Add</button>
        </form>
        <br>
        <a href="index.php"><button>Back</button></a>
    </div>
<?php endif; ?>

<script>
    function redirectToSelected() {
        var destination = document.getElementById("destination").value;
        if (destination === "component") {
            window.location.href = "component.php";
        } else if (destination === "score") {
            window.location.href = "score.php";
        } else if (destination === "documentation") {
            window.location.href = "documentation.php";
        }
    }
</script>


            <!-- Add DPO form -->
            <button id="addDPO">Add New DPO</button>
            <div id="addDPOForm" style="display: none;">
                <form action="add_dpo.php" method="POST">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" rows="4" required>
                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" required>
                    <button type="submit">Add</button>
                </form>
            </div>

            <!-- Display success message -->
           <!-- <?php if(isset($_GET['message']) && $_GET['message'] == 'success'): ?>
                <div class="message">
                    DPO is added successfully.
                    <br>
                    <a href="component.php">Component</a>
                    <a href="score.php">Score</a>
                    <a href="documentation.php">Documentation</a><br>
                    <a href="index.php">Back</a>
                </div>
            <?php endif; ?>-->
        </div>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Multimedia Arts. All rights reserved.</p>
</footer>
<script src="script.js"></script>
</body>
</html>
