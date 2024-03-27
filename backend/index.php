<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #555;
        }
        nav ul li a:hover {
            background-color: #777;
        }
        main {
            padding: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <div class="logo">Music</div>
        <ul>
            <!--<li><a href="#">Dashboard</a></li>-->
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
<main>
    <div class="container">
        <!-- Display list of DPOs -->
        <div class="dpo-list">
            <?php
            // Connect to the database
            $host = 'localhost';
            $dbname = 'music';
            $username = 'root';
            $password = 'Database@123';

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

        <!-- Display buttons after adding DPO -->
        <?php if(isset($_GET['message']) && $_GET['message'] == 'success'): ?>
            <div class="message">
                DPO is added successfully.
                <br>
                <a href="component.php"><button>Component</button></a>
                <a href="score.php"><button>Score</button></a>
                <a href="documentation.php"><button>Documentation</button></a><br>
                <a href="index.php"><button>Back</button></a>
            </div>
        <?php endif; ?>

        <!-- Add DPO form -->
        <button id="addDPO">Add DPO</button>
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
    </div>
</main>
<script src="script.js"></script>
</body>
</html>
