<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are submitted
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Here, you should perform validation on the submitted data
        // For example, check if the username is not already taken

        // Once validated, you can insert the new user into your database
        // For demonstration, let's assume a simple insert query
        // Replace 'your_database', 'your_username', and 'your_password' with your actual database credentials
        $pdo = new PDO('mysql:host=localhost;dbname=music', 'root', 'root');
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashedPassword);
        
        if ($stmt->execute()) {
            // If the user is successfully registered, redirect to login page
            header('Location: login.php');
            exit;
        } else {
            // If there's an error with the database, display an error message
            echo "Error occurred while registering the user.";
        }
    }
}
?>
