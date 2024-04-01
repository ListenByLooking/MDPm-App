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

        .dropdown-container {
            display: none;
            margin-top: 10px;
        }

        select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        button {
            padding: 10px;
            border: 5px;
            border-radius: 5px;
            background-color: orange;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: darkorange;
        }
        .popup-window {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
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
    <h1>Original Docs</h1>
    <div id="originalDocsDropdown">
        <select name="originalDocsDestination" id="originalDocsDestination">
            <option value="audiocassette">Audiocassette</option>
            <option value="phonographics">Phonographics</option>
            <option value="dat">DAT</option>
            <option value="openReelTape">Open Reel Tape</option>
        </select>
        <button type="button" onclick="redirectToSelected()">Add</button>
    </div>
</main>
<script>
    function redirectToSelected() {
        var destination = document.getElementById("originalDocsDestination").value;

        if (destination === "audiocassette") {
            var width = 800;
            var height = 700;
            var left = (window.innerWidth - width) / 2;
            var top = (window.innerHeight - height) / 2;
            var options = "width=" + width + ",height=" + height + ",top=" + top + ",left=" + left;
            window.open("audiocassette.php", "_blank", options);
        } else if (destination === "phonographics") {
            var width = 800;
            var height = 700;
            var left = (window.innerWidth - width) / 2;
            var top = (window.innerHeight - height) / 2;
            var options = "width=" + width + ",height=" + height + ",top=" + top + ",left=" + left;
            window.open("phonographicdisks.php", "_blank", options);
        } else if (destination === "dat") {
            var width = 800;
            var height = 700;
            var left = (window.innerWidth - width) / 2;
            var top = (window.innerHeight - height) / 2;
            var options = "width=" + width + ",height=" + height + ",top=" + top + ",left=" + left;
            window.open("dat.php", "_blank", options);
        } else if (destination === "openReelTape") {
            var width = 800;
            var height = 700;
            var left = (window.innerWidth - width) / 2;
            var top = (window.innerHeight - height) / 2;
            var options = "width=" + width + ",height=" + height + ",top=" + top + ",left=" + left;
            window.open("tape_details.php", "_blank", options);
        }
    }
</script>
<footer>
    <!-- Footer content -->
    <p>&copy; <?php echo date("Y"); ?> Multimedia Arts. All rights reserved.</p>
</footer>
</body>
</html>