<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>User Dashboard</title></head>
<body>
<h1>Welcome <?php echo $_SESSION['user']; ?></h1>
<p>Explore our cakes and place orders!</p>
<a href="logout.php">Logout</a>
</body>
</html>
