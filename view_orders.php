<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "cake_enquiry";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM orders");

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Occasion</th><th>Size</th><th>Flavor</th><th>Date</th><th>Design</th><th>Message</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['occasion']."</td>
                <td>".$row['size']."</td>
                <td>".$row['flavor']."</td>
                <td>".$row['delivery_date']."</td>
                <td>".$row['design']."</td>
                <td>".$row['message']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No orders found.";
}

$conn->close();
?>
