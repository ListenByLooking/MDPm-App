<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiocassette</title>
</head>
<body>
    <form action="add_audiocassette.php" method="POST">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="preservation_signature">Preservation Signature:</label>
        <input type="text" id="preservation_signature" name="preservation_signature" required><br><br>

        <label for="original_signature">Original Signature:</label>
        <input type="text" id="original_signature" name="original_signature" required><br><br>

        <label for="brand">Brand:</label>
        <select id="brand" name="brand" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select><br><br>

        <label for="brand_of_box">Brand of the Box:</label>
        <select id="brand_of_box" name="brand_of_box" required>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
        </select><br><br>

        <label for="cassette_type">Cassette Type:</label>
        <select id="cassette_type" name="cassette_type" required>
            <option value="IEC1">IEC1</option>
            <option value="IEC2">IEC2</option>
            <option value="IECIII">IECIII</option>
            <option value="IECIV">IECIV</option>
        </select><br><br>

        <label for="noise_reduction">Noise Reduction:</label>
        <input type="checkbox" id="noise_reduction" name="noise_reduction" value="yes">
        <label for="noise_reduction">Yes</label>
        <input type="checkbox" id="noise_reduction" name="noise_reduction" value="no">
        <label for="noise_reduction">No</label>
        <input type="checkbox" id="noise_reduction" name="noise_reduction" value="unknown">
        <label for="noise_reduction">Unknown</label><br><br>

        <label for="notes">Notes:</label><br>
        <textarea id="notes" name="notes" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
