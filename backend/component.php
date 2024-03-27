<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Component</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
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
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #555;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: #777;
        }
        main {
            padding: 20px;
            text-align: center;
        }
        .component-content {
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #333;
        }
        h2 {
            font-size: 24px;
            margin-top: 40px;
            margin-bottom: 10px;
            color: #555;
        }
        /* Button styles */
        .component-content a {
            text-decoration: none;
            color: #fff;
            position: relative;
            overflow: hidden;
            display: inline-block;
            margin: 10px;
        }
        .component-content button {
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(135deg, #007bff, #0056b3); /* Gradient background */
            color: #fff;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            z-index: 1;
        }
        .component-content button:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: -1;
            transition: width 0.3s, height 0.3s, top 0.3s, left 0.3s;
            transform: translate(-50%, -50%);
        }
        .component-content a:hover button {
            transform: scale(0.9); /* Button scale on hover */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Button shadow on hover */
        }
        .component-content a:hover button:before {
            width: 0;
            height: 0;
            top: 50%;
            left: 50%;
        }
        /* Icon styles */
        .fas {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            font-size: 30px;
            opacity: 0.3;
            z-index: 0;
            transition: opacity 0.3s, transform 0.3s;
        }
        .component-content a:hover .fas {
            opacity: 1; /* Icon opacity on hover */
            transform: translate(-50%, -50%) scale(1.2); /* Icon scale on hover */
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
            <a href="add_component.php">
                <button>Hardware</button>
                <i class="fas fa-cogs"></i> <!-- Font Awesome icon -->
            </a>
        </div>

        <div>
            <a href="add_component.php">
                <button>Software</button>
                <i class="fas fa-code"></i> <!-- Font Awesome icon -->
            </a>
        </div>

        <div>
            <a href="audiovisual.php">
                <button>Audiovisual</button>
                <i class="fas fa-film"></i> <!-- Font Awesome icon -->
            </a>
        </div>

        <div>
            <a href="add_component.php">
                <button>Various</button>
                <i class="fas fa-cube"></i> <!-- Font Awesome icon -->
            </a>
        </div>
    </div>
</main>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
