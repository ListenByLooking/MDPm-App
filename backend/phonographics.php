<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonographic Disks Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"], select, textarea {
            width: calc(100% - 22px); /* Adjusted width for the arrow */
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
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23333' width='18px' height='18px'%3E%3Cpath d='M7 10l5 5 5-5H7z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position-x: calc(100% - 10px);
            background-position-y: center;
            padding-right: 20px; /* Adjusted padding for the arrow */
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
        /* Styles for the add button */
        .add-button {
            display: inline-block;
            padding: 8px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 5px;
        }
        .add-button:hover {
            background-color: #0056b3;
        }
        /* Styles for dropdown container */
        .dropdown-container {
            display: flex;
            align-items: center;
        }
        .dropdown-container select {
            flex: 1;
        }
        /* Styles for checkboxes */
        .checkbox-container {
            display: flex;
            align-items: center;
        }
        .checkbox-container label {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<form action="add_phonographicdisks.php" method="POST">
    <h1>Phonographic Disks Form</h1>
    <!-- Your form fields -->
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" required><br>

    <label for="preservation_signature">Preservation Signature:</label>
    <input type="text" id="preservation_signature" name="preservation_signature" required><br>

    <label for="original_signature">Original Signature:</label>
    <input type="text" id="original_signature" name="original_signature" required><br>

    <label for="brand">Brand:</label>
    <div class="dropdown-container">
        <select id="brand" name="brand" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        <button type="button" class="add-button" onclick="addOption('brand')">+</button>
    </div><br>

    <!-- Repeat the same structure for other dropdowns -->
    <label for="brand_of_box">Brand of the Box:</label>
    <div class="dropdown-container">
        <select id="brand_of_box" name="brand_of_box" required>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
        </select>
        <button type="button" class="add-button" onclick="addOption('brand_of_box')">+</button>
    </div><br>

    <label for="rpm">RPM:</label>
    <div class="dropdown-container">
        <select id="rpm" name="rpm" required>
            <option value="33rpm">33 rpm</option>
            <option value="45rpm">45 rpm</option>
            <option value="78rpm">78 rpm</option>
            <option value="80rpm">80 rpm</option>
        </select>
        <button type="button" class="add-button" onclick="addOption('rpm')">+</button>
    </div><br>

    <label for="stylus">Stylus:</label>
    <div class="dropdown-container">
        <select id="stylus" name="stylus" required>
            <option value="A">A</option>
            <option value="B">B</option>
        </select>
        <button type="button" class="add-button" onclick="addOption('stylus')">+</button>
    </div><br>

    <label for="eq">EQ:</label>
    <div class="dropdown-container">
        <select id="eq" name="eq" required>
            <option value="RIAA">RIAA</option>
            <option value="Other">Other</option>
        </select>
        <button type="button" class="add-button" onclick="addOption('eq')">+</button>
    </div><br>

    <label for="type_of_recording">Type of Recording:</label>
    <div class="checkbox-container">
        <input type="checkbox" id="mechanical" name="type_of_recording" value="mechanical">
        <label for="mechanical">Mechanical</label>
        <input type="checkbox" id="electrical" name="type_of_recording" value="electrical">
        <label for="electrical">Electrical</label>
    </div><br>

    <label for="incisions">Incisions:</label>
    <div class="checkbox-container">
        <input type="checkbox" id="horizontal" name="incisions" value="horizontal">
        <label for="horizontal">Horizontal</label>
        <input type="checkbox" id="vertical" name="incisions" value="vertical">
        <label for="vertical">Vertical</label>
    </div><br>

    <label for="notes">Notes:</label><br>
    <textarea id="notes" name="notes" rows="4" cols="50"></textarea><br>

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