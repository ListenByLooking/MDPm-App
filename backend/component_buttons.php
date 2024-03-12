<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Component Buttons</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Component Buttons</h1>
    </header>
    <main>
        <div class="container">
            <button onclick="redirectToPage('Hardware')">Hardware</button>
            <button onclick="redirectToSoftware()">Software</button>
            <button onclick="redirectToAudiovisual()">Audiovisual</button>
            <button onclick="redirectToVarious()">Various</button>
        </div>
    </main>
    <script>
    function redirectToPage(page) {
        if (page === 'Hardware') {
                window.location.href = 'hardware_info.php';
            }
    }
   function redirectToSoftware() {
        window.location.href = 'software_info.php?id=<?php echo $dpo_id; ?>';
    }
    function redirectToAudiovisual() {
        window.location.href = 'audiovisual_info.php?id=<?php echo $dpo_id; ?>';
    }
    function redirectToVarious() {
        window.location.href = 'various_info.php?id=<?php echo $dpo_id; ?>';
    }
</script>

</body>
</html>
