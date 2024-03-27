<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        select,
        textarea {
            width: calc(100% - 22px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-block;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        /* Styles for the Add button */
        .add-button {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 5px;
        }
        .add-button:hover {
            background-color: #0056b3;
        }
        /* Styles for the Save button */
        .save-button {
            padding: 12px 24px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-block;
            margin-top: 20px;
        }
        .save-button:hover {
            background-color: #0056b3;
        }
        /* Icon styles */
        .fas {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<form action="add_dat.php" method="POST">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" required>

    <label for="preservation_signature">Preservation Signature:</label>
    <input type="text" id="preservation_signature" name="preservation_signature" required>

    <label for="original_signature">Original Signature:</label>
    <input type="text" id="original_signature" name="original_signature" required>

    <label for="brand">Brand:</label>
    <div>
        <select id="brand" name="brand" required>
            <option value="">Select...</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        <button type="button" class="add-button" onclick="addOption('brand')">+</button>
    </div>

    <label for="brand_of_box">Brand of the Box:</label>
    <div>
        <select id="brand_of_box" name="brand_of_box" required>
            <option value="">Select...</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
        </select>
        <button type="button" class="add-button" onclick="addOption('brand_of_box')">+</button>
    </div>

    <label for="samplerate">Samplerate:</label>
    <div>
        <select id="samplerate" name="samplerate" required>
            <option value="">Select...</option>
            <option value="24000hz">24000 Hz</option>
            <option value="44100hz">44100 Hz</option>
            <option value="48000hz">48000 Hz</option>
            <option value="88200hz">88200 Hz</option>
            <option value="96000hz">96000 Hz</option>
            <option value="192000hz">192000 Hz</option>
        </select>
        <button type="button" class="add-button" onclick="addOption('samplerate')">+</button>
    </div>

    <label for="notes">Notes:</label>
    <textarea id="notes" name="notes" rows="4" cols="50"></textarea>

    <input type="submit" value="Save" class="save-button">
</form>

<script>
    function addOption(selectId) {
        var select = document.getElementById(selectId);
        var option = prompt("Enter new option:");
        if (option) {
            var newOption = document.createElement("option");
            newOption.text = option;
            newOption.value = option;
            select.add(newOption);
            select.value = option;
        }
    }
</script>

</body>
</html>
