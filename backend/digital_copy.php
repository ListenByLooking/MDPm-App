<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Copy</title>
    <!-- Add your CSS styles here if needed -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
    <h1>Digital Copy</h1>
    <form action="insert_digital_copy.php" method="post">
        <label for="signature">Signature:</label><br>
        <input type="text" id="signature" name="signature" required><br>

        <label for="format">Format:</label><br>
        <select id="format" name="format">
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select><br>

        <label for="original_item">Original Item:</label><br>
        <select id="original_item" name="original_item">
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select><br>

        <label for="codec">Codec:</label><br>
        <select id="codec" name="codec">
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select><br>

        <label for="bitrate">Bitrate:</label><br>
        <input type="text" id="bitrate" name="bitrate"><br>

        <label for="bitdepth_audio">Bitdepth (Audio):</label><br>
        <select id="bitdepth_audio" name="bitdepth_audio">
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select><br>

        <label for="bitdepth_video">Bitdepth (Video):</label><br>
        <select id="bitdepth_video" name="bitdepth_video">
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select><br>

        <label for="resolution">Resolution:</label><br>
        <select id="resolution" name="resolution">
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select><br>

        <label for="aspect_ratio">Aspect Ratio:</label><br>
        <select id="aspect_ratio" name="aspect_ratio">
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select><br>

        <label for="frame_rate">Frame Rate:</label><br>
        <select id="frame_rate" name="frame_rate">
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select><br>

        <label for="sample_frequency">Sample Frequency:</label><br>
        <select id="sample_frequency" name="sample_frequency">
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select><br>

        <label for="acquisition_device">Acquisition Device:</label><br>
        <input type="text" id="acquisition_device" name="acquisition_device"><br>

        <label for="notes">Notes:</label><br>
        <textarea id="notes" name="notes" rows="4"></textarea><br>

        <input type="submit" value="Submit">
    </form>
    </main>
    <footer>
    <!-- Footer content -->
    <p>&copy; <?php echo date("Y"); ?> Multimedia Arts. All rights reserved.</p>
</footer>
</body>
</html>