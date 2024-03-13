global$dpo_id; <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentation Buttons</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Documentation Buttons</h1>
    </header>
    <main>
        <div class="container">
            <button onclick="redirectToPhotos()">Photos</button>
            <button onclick="redirectToAV()">A/V</button>
            <button onclick="redirectToInterviews()">Interviews</button>
            <button onclick="redirectToDocs()">Docs</button>
        </div>
    </main>
    <script>
    function redirectToPhotos() {
        window.location.href = 'photos_info.php?id=<?php echo $dpo_id; ?>';
    }
    function redirectToInterviews(){
        window.location.href = 'interviews_info.php?id=<?php echo $dpo_id; ?>';
    }
    function redirectToAV() {
        window.location.href = 'av_info.php?id=<?php echo $dpo_id; ?>';
    }
    function redirectToDocs(){
        window.location.href = 'docs_info.php?id=<?php echo $dpo_id; ?>';
    }
</script>

</body>
</html>
