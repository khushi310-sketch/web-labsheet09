<?php
require_once "db.php";

$email = $_GET['email'] ?? '';

// Unsafe example (vulnerable)
$sql = "SELECT * FROM users WHERE email='$email'";

// Secure example
$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();

echo "Prepared Statement Executed";
?>