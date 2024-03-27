<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiocassette Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input[type="text"], select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #fff;
            background-image: linear-gradient(45deg, transparent 50%, #333 50%), linear-gradient(135deg, #333 50%, transparent 50%);
            background-position: calc(100% - 20px) calc(1em + 2px), calc(100% - 15px) 50%;
            background-size: 5px 5px, 5px 5px;
            background-repeat: no-repeat;
            padding-right: 30px; /* Adjust the padding for the arrow */
        }
        textarea {
            resize: vertical;
        }
        input[type="checkbox"] {
            margin-top: 10px;
            margin-right: 5px;
            vertical-align: middle;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        /* Additional Styles */
        .background-icon {
            position: absolute;
            top: 0;
            left: 0;
            font-size: 150px;
            color: rgba(0, 0, 0, 0.05);
            pointer-events: none;
        }
        .save-icon {
            margin-left: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1><i class="fas fa-microphone-alt background-icon"></i> Audiocassette Form</h1>
    <form action="add_audiocassette.php" method="POST">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>

        <label for="preservation_signature">Preservation Signature:</label>
        <input type="text" id="preservation_signature" name="preservation_signature" required><br>

        <label for="original_signature">Original Signature:</label>
        <input type="text" id="original_signature" name="original_signature" required><br>

        <label for="brand">Brand:</label>
        <select id="brand" name="brand" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select><br>

        <label for="brand_of_box">Brand of the Box:</label>
        <select id="brand_of_box" name="brand_of_box" required>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
        </select><br>

        <label for="cassette_type">Cassette Type:</label>
        <select id="cassette_type" name="cassette_type" required>
            <option value="IEC1">IEC1</option>
            <option value="IEC2">IEC2</option>
            <option value="IECIII">IECIII</option>
            <option value="IECIV">IECIV</option>
        </select><br>

        <label for="noise_reduction">Noise Reduction:</label>
        <input type="checkbox" id="noise_reduction" name="noise_reduction" value="yes">
        <label for="noise_reduction">Yes</label>
        <input type="checkbox" id="noise_reduction" name="noise_reduction" value="no">
        <label for="noise_reduction">No</label>
        <input type="checkbox" id="noise_reduction" name="noise_reduction" value="unknown">
        <label for="noise_reduction">Unknown</label><br>

        <label for="notes">Notes:</label><br>
        <textarea id="notes" name="notes" rows="4" cols="50"></textarea><br>

        <input type="submit" value="Save"><i class="fas fa-check save-icon"></i>
    </form>
</div>
</body>
</html>
