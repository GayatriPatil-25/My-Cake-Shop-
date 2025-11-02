<?php
// Database configuration
$host = "localhost";
$user = "root";       // your DB username
$pass = "";           // your DB password
$db   = "cake_enquiry";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get form data
    $name       = sanitize($_POST['name']);
    $email      = sanitize($_POST['email']);
    $phone      = sanitize($_POST['phone']);
    $occasion   = sanitize($_POST['occasion']);
    $size       = sanitize($_POST['size']);
    $flavor     = sanitize($_POST['flavor']);
    $date       = sanitize($_POST['date']);
    $message    = sanitize($_POST['message']);
    
    // Handle file upload
    $designPath = NULL;
    if (isset($_FILES['design']) && $_FILES['design']['error'] == 0) {
        $allowedTypes = ['image/jpeg','image/png','image/gif'];
        if (in_array($_FILES['design']['type'], $allowedTypes)) {
            $uploadDir = "uploads/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $fileName = time() . "_" . basename($_FILES['design']['name']);
            $targetFile = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['design']['tmp_name'], $targetFile)) {
                $designPath = $targetFile;
            }
        }
    }

    // Prepare SQL
    $stmt = $conn->prepare("INSERT INTO orders (name, email, phone, occasion, size, flavor, delivery_date, design, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $email, $phone, $occasion, $size, $flavor, $date, $designPath, $message);

    // Execute query
    if ($stmt->execute()) {
        echo "Your order inquiry has been submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request!";
}

header('location:index.php');
?>
