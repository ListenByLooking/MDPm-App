<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Preservation</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Additional CSS styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        main {
            padding: 20px;
            display: flex;
            justify-content: left;
            align-items: left;
            flex-direction: column;
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
    </style>
</head>
<body>
<main>
    <h4 style="color: darkblue">Original Docs:</h4>
    <select name="audioDocsDestination" id="audioDocsDestination">
        <option value="audiocassette">Audiocassette</option>
        <option value="dat">DAT</option>
        <option value="openreeltape">Open Reel Tape</option>
        <option value="phonographicdisks">Phonographic Disks</option>
    </select>
    <button type="button" onclick="redirectToSelected()">Add</button>
</main>

<script>
    function redirectToSelected() {
        var selectedOption = document.getElementById("audioDocsDestination").value;
        if (selectedOption === "audiocassette") {
            window.location.href = "audiocassette.php";
        } else if (selectedOption === "dat") {
            window.location.href = "dat.php";
        } else if (selectedOption === "openreeltape") {
            window.location.href = "tape_details.php";
        } else if (selectedOption === "phonographicdisks") {
            window.location.href = "phonographicdisks.php";
        }
    }
</script>
</body>
</html>