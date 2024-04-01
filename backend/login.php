<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are submitted
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Here, you should retrieve the hashed password from the database based on the submitted username
        // For demonstration, let's assume a simple query
        // Replace 'your_database', 'your_username', and 'your_password' with your actual database credentials
        $pdo = new PDO('mysql:host=localhost;dbname=music', 'root', 'root');
        $stmt = $pdo->prepare("SELECT password FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            $hashedPassword = $result['password'];

            // Verify the submitted password against the hashed password
            if (password_verify($password, $hashedPassword)) {
                // If passwords match, set session and redirect to welcome.php
                $_SESSION['username'] = $username;
                header('Location: welcome.php');
                exit;
            } else {
                // If passwords don't match, display an error message
                $error = "Invalid username or password. Please try again.";
            }
        } else {
            // If the username is not found, display an error message
            $error = "Invalid username or password. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
</body>
</html>
