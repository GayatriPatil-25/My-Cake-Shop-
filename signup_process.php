<?php
include "db.php";  // include database connection

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check if email exists
$result = $conn->query("SELECT id FROM users WHERE email='$email'");
if($result->num_rows > 0){
    echo "Email already registered!";
} else {
    $conn->query("INSERT INTO users (full_name, email, password) VALUES ('$name', '$email', '$password')");
    echo "Signup successful! <a href='auth.php'>Login here</a>";
}

$conn->close();
header('location:index.php');
?>
