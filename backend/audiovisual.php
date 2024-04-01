<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiovisual</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
    <!--<style>
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
    </style>-->
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
    <h1>Component Audiovisual</h1>
    <div class="audiovisual-content">
        <form id="redirectForm" action="" method="GET">
            <select name="destination" id="destination" onchange="showHideDropdown()">
                <option value="video">Video</option>
                <option value="photo">Photo</option>
                <option value="audio">Audio</option>
            </select>
            <div id="audioDropdown" style="display: none;">
                <select name="audioDestination" id="audioDestination" onchange="showHideOriginalDocsDropdown()">
                    <option value="originalDocs">Original Docs</option>
                    <option value="analogCopy">Digital Copy</option>
                </select>
                <div id="originalDocsDropdown" style="display: none;">
                    <select name="originalDocsDestination" id="originalDocsDestination">
                        <option value="audiocassette">Audiocassette</option>
                        <option value="phonographics">Phonographics</option>
                        <option value="dat">DAT</option>
                        <option value="openReelTape">Open Reel Tape</option>
                    </select>
                </div>
            </div>
            <button type="button" onclick="redirectToSelected()">Add</button>
        </form>
    </div>

    <script>
        function redirectToSelected() {
            var destination = document.getElementById("originalDocsDestination").value;

            if (destination === "audiocassette") {
                window.location.href = "audiocassette.php";
            } else if (destination === "phonographics") {
                window.location.href = "phonographicdisks.php";
            } else if (destination === "dat") {
                window.location.href = "dat.php";
            } else if (destination === "openReelTape") {
                window.location.href = "tape_details.php";
            }
        }

        function showHideDropdown() {
            var destination = document.getElementById("destination").value;
            var audioDropdown = document.getElementById("audioDropdown");
            if (destination === "audio") {
                audioDropdown.style.display = "block";
            } else {
                audioDropdown.style.display = "none";
            }
        }

        function showHideOriginalDocsDropdown() {
            var audioDestination = document.getElementById("audioDestination").value;
            var originalDocsDropdown = document.getElementById("originalDocsDropdown");
            if (audioDestination === "originalDocs") {
                originalDocsDropdown.style.display = "block";
            } else {
                originalDocsDropdown.style.display = "none";
            }
        }
    </script>





    <!--<div class="component-content">
        
        <div>
            <a href="audiocassette.php">
                <i class="fas fa-music icon"></i> 
                <div>AudioCassette</div>
            </a>
        </div>

        <div>
            <a href="phonographicdisks.php">
                <i class="fas fa-record-vinyl icon"></i> 
                <div>Phonographicdisks</div> 
            </a>
        </div>

        <div>
            <a href="audiovisual.php">
                <i class="fas fa-tape icon"></i> 
                <div>Openreeltape</div> 
            </a>
        </div>

        <div>
            <a href="dat.php">
                <i class="fas fa-compact-disc icon"></i> 
                <div>Dat</div> 
            </a>
        </div>
    </div>-->
</main>
</body>
</html>