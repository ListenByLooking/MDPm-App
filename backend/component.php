<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Component</title>
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
        .component-options {
            display: flex;
            align-items: center;
            margin-top: 10px; /* Adjust the margin as needed */
        }

        .component-content {
            margin-right: 10px; /* Adjust the spacing between the h4 tag and the dropdown */
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
    <h3 style="color:red">Component Added Successfully</h3>
    <h4 style="color: darkblue">Component Page:</h4>
    <div class="component-content">
        <form id="redirectForm" action="" method="GET">
            <select name="destination" id="destination" onchange="showHideDropdown()">
                <option value="hardware">Hardware</option>
                <option value="software">Software</option>
                <option value="audiovisual">Audiovisual</option>
                <option value="various">Various</option>
            </select>
            <div id="audiovisualDropdown" style="display: none;">
                <h4 style="color: darkblue">Audiovisual Type:</h4>
                <select name="audioDestination" id="audioDestination" onchange="showHideOriginalDocsDropdown()">
                    <option value="video">Video</option>
                    <option value="photo">Photo</option>
                    <option value="audio">Audio</option>
                    <option value="film">Film</option>
                </select>
                <div id="originalDocsDropdown" style="display: none;">
                    <h4 style="color: darkblue">Original Docs:</h4>
                    <select name="originalDocsDestination" id="originalDocsDestination">
                        <option value="originalDocs">Original Docs</option>
                        <option value="digitalCopy">Digital Copy</option>
                    </select>
                </div>
            </div>
            <div id="audioDocsDropdown" style="display: none;">
                <h4 style="color: darkblue">Original Docs:</h4>
                <select name="audioDocsDestination" id="audioDocsDestination">
                    <option value="audiocassette">Audiocassette</option>
                    <option value="dat">DAT</option>
                    <option value="openreeltape">Open Reel Tape</option>
                    <option value="phonographicdisks">Phonographic Disks</option>
                </select>
            </div>
            <button type="button" onclick="redirectToSelected()" style="margin-top: 10px;">Add</button>
        </form>

    </div>

    <script>
        function redirectToSelected() {
            var audioDestination = document.getElementById("audioDestination").value;
            var originalDocsDestination = document.getElementById("originalDocsDestination").value;

            if (audioDestination === "film") {
                if (originalDocsDestination === "originalDocs") {
                    window.location.href = "preservation.php";
                } else if (originalDocsDestination === "digitalCopy") {
                    window.location.href = "digital_copy.php";
                }
            } else if (audioDestination === "audio") {
                if (originalDocsDestination === "originalDocs") {
                    // Redirect to audio_preservation.php
                    window.location.href = "audio_preservation.php";
                } else if (originalDocsDestination === "digitalCopy") {
                    // Redirect to digital_copy.php
                    window.location.href = "digital_copy.php";
                }
            }


        }


        function showHideDropdown() {
            var destination = document.getElementById("destination").value;
            var audiovisualDropdown = document.getElementById("audiovisualDropdown");
            if (destination === "audiovisual") {
                audiovisualDropdown.style.display = "block";
            } else {
                audiovisualDropdown.style.display = "none";
            }
        }

        function showHideOriginalDocsDropdown() {
            var audioDestination = document.getElementById("audioDestination").value;
            var originalDocsDropdown = document.getElementById("originalDocsDropdown");
            if (audioDestination === "film" || audioDestination === "audio") {
                originalDocsDropdown.style.display = "block";
            } else {
                originalDocsDropdown.style.display = "none";
            }
        }
    </script>
</main>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>