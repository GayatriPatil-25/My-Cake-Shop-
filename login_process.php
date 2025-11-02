<?php
include "db.php";  // include database connection

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT id, full_name, password FROM users WHERE email='$email'");
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if(password_verify($password, $row['password'])){
        echo "Login successful! Welcome " . $row['full_name'];
    } else {
        echo "Invalid password!";
    }
} else {
    echo "Email not found!";
}

$conn->close();
header('location:index.php');
?>
