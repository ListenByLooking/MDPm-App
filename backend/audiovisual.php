<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiovisual</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Updated background color */
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #343a40; /* Updated header background color */
            color: #fff;
            padding: 20px;
            text-align: center; /* Center align header */
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
            padding: 10px;
            border-radius: 5px;
            background-color: #6c757d; /* Updated navigation button background color */
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: #007bff; /* Updated hover background color */
        }
        main {
            padding: 20px;
            text-align: center;
        }
        .component-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .component-content div {
            width: 200px; /* Set button width */
        }
        .component-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .component-content a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s;
            display: block; /* Change to block to display buttons one below the other */
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            background-color: #007bff; /* Button background color */
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add box shadow */
            margin-bottom: 20px; /* Add margin bottom */
        }
        .component-content a:hover {
            color: #fff; /* Updated hover text color */
            background-color: #0056b3; /* Updated hover background color */
        }
        .component-content button {
            display: none; /* Hide buttons */
        }
        /* Additional Styles */
        .icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            transition: transform 0.3s;
        }
        .component-content a:hover .icon {
            transform: translate(-50%, -50%) scale(1.2); /* Scale the icon on hover */
        }
    </style>
</head>
<body>
<header>
    <nav>
        <div class="logo">Music</div>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
<main>
    <h1>Component Page</h1>
    <div class="component-content">
        <!-- Content related to Component -->
        <div>
            <a href="audiocassette.php">
                <i class="fas fa-music icon"></i> <!-- Font Awesome icon -->
                <div>AudioCassette</div> <!-- Button name -->
            </a>
        </div>

        <div>
            <a href="phonographicdisks.php">
                <i class="fas fa-record-vinyl icon"></i> <!-- Font Awesome icon -->
                <div>Phonographicdisks</div> <!-- Button name -->
            </a>
        </div>

        <div>
            <a href="audiovisual.php">
                <i class="fas fa-tape icon"></i> <!-- Font Awesome icon -->
                <div>Openreeltape</div> <!-- Button name -->
            </a>
        </div>

        <div>
            <a href="dat.php">
                <i class="fas fa-compact-disc icon"></i> <!-- Font Awesome icon -->
                <div>Dat</div> <!-- Button name -->
            </a>
        </div>
    </div>
</main>
</body>
</html>
