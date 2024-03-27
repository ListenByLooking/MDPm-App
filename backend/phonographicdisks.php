<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonographicdisks</title>
</head>
<body>
    <form action="add_phonographicdisks.php" method="POST">
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

        <label for="rpm">rpm:</label>
        <select id="rpm" name="rpm" required>
            <option value="33rpm">33 rpm</option>
            <option value="45rpm">45 rpm</option>
            <option value="78rpm">78 rpm</option>
            <option value="80rpm">80 rpm</option>
        </select><br><br>
        
        <label for="stylus">stylus:</label>
        <select id="stylus" name="stylus" required>
            <option value="A">A</option>
            <option value="B">B</option>
        </select><br><br>
        
        <label for="eq">eq:</label>
        <select id="eq" name="eq" required>
            <option value="RIAA">RIAA</option>
            <option value="Other">Other</option>
        </select><br><br>
        
         <label for="type_of_recording">Type of Recording:</label>
        <input type="checkbox" id="type_of_recording" name="type_of_recording" value="mechanical">
        <label for="type_of_recording">Mechanical</label>
        <input type="checkbox" id="type_of_recording" name="type_of_recording" value="electrical">
        <label for="type_of_recording">Electrical</label><br><br>

        <label for="incisions">Incisions</label>
        <input type="checkbox" id="incisions" name="incisions" value="horizontal">
        <label for="incisions">Horizontal</label>
        <input type="checkbox" id="incisions" name="incisions" value="vertical">
        <label for="incisions">Vertical</label><br><br>

        <label for="notes">Notes:</label><br>
        <textarea id="notes" name="notes" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
