<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve user information from the file (you might want to query a database in a real application)
    $users = file("users.csv", FILE_IGNORE_NEW_LINES);
    
    foreach ($users as $user) {
        list($firstName, $lastName, $email, $phoneNumber, $hashedPassword) = explode(",", $user);
        
        if ($email == $username && password_verify($password, $hashedPassword)) {
            // Login successful, redirect to a thank you page
            header("Location: loginthanks.html");
            exit();
        }
    }

    // Login failed, redirect back to the login page
    header("Location: login.html");
    exit();
}
?>
