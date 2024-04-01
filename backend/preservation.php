<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preservation Form</title>
    <style>
        /* Add your CSS styles here */
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
            width: 60%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        label {
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="number"],
        select {
            width: 97%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
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
    <h1>Preservation Form</h1>
    <form action="insert-preservation.php" method="post">
        <label for="progressive">Progressive:</label><br>
        <input type="text" id="progressive" name="progressive"><br>

        <label for="preservation_signature">Preservation Signature:</label><br>
        <input type="text" id="preservation_signature" name="preservation_signature"><br>

        <label for="original_signature">Original Signature:</label><br>
        <input type="text" id="original_signature" name="original_signature"><br>

        <label for="type">Type:</label><br>
        <select id="type" name="type">
            <option value="Type1">Type 1</option>
            <option value="Type2">Type 2</option>
            <option value="Type3">Type 3</option>
        </select><br>

        <label for="format">Format:</label><br>
        <select id="format" name="format">
            <option value="Format1">Format 1</option>
            <option value="Format2">Format 2</option>
            <option value="Format3">Format 3</option>
        </select><br>

        <label for="generation">Generation:</label><br>
        <select id="generation" name="generation">
            <option value="Generation1">Generation 1</option>
            <option value="Generation2">Generation 2</option>
            <option value="Generation3">Generation 3</option>
        </select><br>

        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>

        <label for="author">Author:</label><br>
        <input type="text" id="author" name="author"><br>

        <label for="year">Year:</label><br>
        <input type="number" id="year" name="year"><br>

        <label for="support_material">Support Material:</label><br>
        <select id="support_material" name="support_material">
            <option value="Material1">Material 1</option>
            <option value="Material2">Material 2</option>
            <option value="Material3">Material 3</option>
        </select><br>

        <label for="color_bw">Color/BW:</label><br>
        <select id="color_bw" name="color_bw">
            <option value="Color">Color</option>
            <option value="BW">BW</option>
        </select><br>

        <label for="sound">Sound:</label><br>
        <select id="sound" name="sound">
            <option value="Sound1">Sound 1</option>
            <option value="Sound2">Sound 2</option>
            <option value="Sound3">Sound 3</option>
        </select><br>

        <label for="aspect_ratio">Aspect Ratio:</label><br>
        <select id="aspect_ratio" name="aspect_ratio">
            <option value="Aspect Ratio1">Ratio 1</option>
            <option value="Aspect Ratio2">Ratio 2</option>
            <option value="Aspect Ratio3">Ratio 3</option>
        </select><br>

        <label for="film_brand">Film Brand:</label><br>
        <select id="film_brand" name="film_brand">
            <option value="Film Brand1">Brand 1</option>
            <option value="Film Brand2">Brand 2</option>
            <option value="Film Brand3">Brand 3</option>
        </select><br>

        <label for="carter_brand">Carter Brand:</label><br>
        <select id="carter_brand" name="carter_brand">
            <option value="Carter Brand1">Carter 1</option>
            <option value="Carter Brand2">Carter 2</option>
            <option value="Carter Brand3">Carter 3</option>
        </select><br>

        <label for="carter_material">Carter Material:</label><br>
        <select id="carter_material" name="carter_material">
            <option value="Carter Material1">Carter Material 1</option>
            <option value="Carter Material2">Carter Material 2</option>
            <option value="Carter Material3">Carter Material 3</option>
        </select><br>

        <label for="cover_material">Cover Material:</label><br>
        <select id="cover_material" name="cover_material">
            <option value="Cover Material1">Cover Material 1</option>
            <option value="Cover Material2">Cover Material 2</option>
            <option value="Cover Material3">Cover Material 3</option>
        </select><br>

        <label for="cement_splices">Cement Splices:</label><br>
        <input type="number" id="cement_splices" name="cement_splices"><br>

        <label for="restored_cs">Restored CS:</label><br>
        <input type="number" id="restored_cs" name="restored_cs"><br>

        <label for="tape_splices">Tape Splices:</label><br>
        <input type="number" id="tape_splices" name="tape_splices"><br>

        <label for="restored_ts">Restored TS:</label><br>
        <input type="number" id="restored_ts" name="restored_ts"><br>

        <label for="restored_perforations">Restored Perforations:</label><br>
        <input type="number" id="restored_perforations" name="restored_perforations"><br>

        <label for="restored_frames">Restored Frames:</label><br>
        <input type="number" id="restored_frames" name="restored_frames"><br>

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