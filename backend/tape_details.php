<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tape Details Form</title>
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

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
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
        /* Styles for dropdown container */
        .dropdown-container {
            display: flex;
            align-items: center;
        }
        .dropdown-container select {
            flex: 1;
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
    <h1>Open Reel Tape Form</h1>
    <form action="insert_tape_details.php" method="post">
        <label for="preservation_signature">Preservation Signature:</label><br>
        <input type="text" id="preservation_signature" name="preservation_signature" required><br>

        <label for="original_signature">Original Signature:</label><br>
        <input type="text" id="original_signature" name="original_signature" required><br>

        <label for="brand_of_tape">Brand of Tape:</label><br>
        <div class="dropdown-container">
            <select id="brand_of_tape" name="brand_of_tape" required>
                <option value="Brand1">Brand 1</option>
                <option value="Brand2">Brand 2</option>
                <option value="Brand3">Brand 3</option>
            </select>
            <button type="button" class="add-button" onclick="addOption('brand_of_tape')">+</button>
        </div>
        <label for="brand_of_box">Brand of Box:</label><br>
        <div class="dropdown-container">
            <select id="brand_of_box" name="brand_of_box" required>
                <option value="Brand1">Brand 1</option>
                <option value="Brand2">Brand 2</option>
                <option value="Brand3">Brand 3</option>
            </select>
            <button type="button" class="add-button" onclick="addOption('brand_of_box')">+</button>
        </div>
        <label for="brand_of_carter">Brand of Carter:</label><br>
        <div class="dropdown-container">
            <select id="brand_of_carter" name="brand_of_carter" required>
                <option value="Brand1">Brand 1</option>
                <option value="Brand2">Brand 2</option>
                <option value="Brand3">Brand 3</option>
            </select>
            <button type="button" class="add-button" onclick="addOption('brand_of_carter')">+</button>
        </div>
        <label for="material_of_carter">Material of Carter:</label><br>
        <div class="dropdown-container">
            <select id="material_of_carter" name="material_of_carter" required>
                <option value="Material1">Material 1</option>
                <option value="Material2">Material 2</option>
                <option value="Material3">Material 3</option>
            </select>
            <button type="button" class="add-button" onclick="addOption('material_of_carter')">+</button>
        </div>
        <label for="diameter_of_carter">Diameter of Carter:</label><br>
        <div class="dropdown-container">
            <select id="diameter_of_carter" name="diameter_of_carter" required>
                <option value="Diameter1">Diameter 1</option>
                <option value="Diameter2">Diameter 2</option>
                <option value="Diameter3">Diameter 3</option>
            </select>
            <button type="button" class="add-button" onclick="addOption('diameter_of_carter')">+</button>
        </div>
        <label for="tape_width">Tape Width:</label><br>
        <div class="dropdown-container">
            <select id="tape_width" name="tape_width" required>
                <option value="2 inch">2 inch</option>
                <option value="1 inch">1 inch</option>
                <option value="½ inch">½ inch</option>
                <option value="¼ inch">¼ inch</option>
            </select>
            <button type="button" class="add-button" onclick="addOption('tape_width')">+</button>
        </div>
        <label for="num_of_sides">Number of Sides:</label><br>
        <input type="number" id="num_of_sides" name="num_of_sides" min="1" required><br>

        <label for="num_of_channels_sideA">Number of Channels on SideA:</label><br>
        <input type="number" id="num_of_channels_sideA" name="num_of_channels_sideA" min="1" required><br>

        <label for="channels_config_sideA">Channels Configuration (SideA):</label><br>
        <div class="dropdown-container">
            <select id="channels_config_sideA" name="channels_config_sideA" required>
                <option value="Mono">Mono</option>
                <option value="Stereo">Stereo</option>
                <option value="Dual Mono">Dual Mono</option>
                <option value="Quadriphonic">Quadriphonic</option>
            </select>
            <button type="button" class="add-button" onclick="addOption('channels_config_sideA')">+</button>
        </div>
        <label for="speed_sideA">Speed (SideA):</label><br>
        <div class="dropdown-container">
            <select id="speed_sideA" name="speed_sideA" required>
                <option value="2,38 cm/s">2,38 cm/s</option>
                <option value="4,75 cm/s">4,75 cm/s</option>
                <option value="9,5 cm/s">9,5 cm/s</option>
                <option value="19 cm/s">19 cm/s</option>
                <option value="38 cm/s">38 cm/s</option>
                <option value="76 cm/s">76 cm/s</option>
            </select>
            <button type="button" class="add-button" onclick="addOption('speed_sideA')">+</button>
        </div>
        <label for="num_of_channels_sideB">Number of Channels on SideB:</label><br>
        <input type="number" id="num_of_channels_sideB" name="num_of_channels_sideB" min="1" required><br>

        <label for="channels_config_sideB">Channels Configuration (SideB):</label><br>
        <div class="dropdown-container">
            <select id="channels_config_sideB" name="channels_config_sideB" required>
                <option value="Mono">Mono</option>
                <option value="Stereo">Stereo</option>
                <option value="Dual Mono">Dual Mono</option>
                <option value="Quadriphonic">Quadriphonic</option>
            </select>
            <button type="button" class="add-button" onclick="addOption('channels_config_sideB')">+</button>
        </div>
        <label for="speed_sideB">Speed (SideB):</label><br>
        <div class="dropdown-container">
            <select id="speed_sideB" name="speed_sideB" required>
                <option value="2,38 cm/s">2,38 cm/s</option>
                <option value="4,75 cm/s">4,75 cm/s</option>
                <option value="9,5 cm/s">9,5 cm/s</option>
                <option value="19 cm/s">19 cm/s</option>
                <option value="38 cm/s">38 cm/s</option>
                <option value="76 cm/s">76 cm/s</option>
            </select>
            <button type="button" class="add-button" onclick="addOption('speed_sideB')">+</button>
        </div>
        <label for="eq">EQ:</label><br>
        <div class="dropdown-container">
            <select id="eq" name="eq" required>
                <option value="IEC1">IEC1</option>
                <option value="IEC2">IEC2</option>
                <option value="CCIR">CCIR</option>
                <option value="NAB">NAB</option>
                <option value="AES">AES</option>
                <option value="DIN">DIN</option>
            </select>
            <button type="button" class="add-button" onclick="addOption('eq')">+</button>
        </div>
        <label for="notes">Notes:</label><br>
        <textarea id="notes" name="notes" rows="4" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
</main>
<footer>
    <!-- Footer content -->
    <p>&copy; <?php echo date("Y"); ?> Multimedia Arts. All rights reserved.</p>
</footer>
</body>
</html>