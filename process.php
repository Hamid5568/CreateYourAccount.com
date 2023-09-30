<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phone"];
    $password = $_POST["pswrd"];

    // You should hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Save user information to a file (you might want to use a database in a real application)
    $userData = "$firstName,$lastName,$email,$phoneNumber,$hashedPassword\n";
    file_put_contents("users.csv", $userData, FILE_APPEND | LOCK_EX);

    // Redirect to a thank you page
    header("Location: thanks.html");
    exit();
}
?>
