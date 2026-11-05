<?php
require_once "db.php";

$q = "%" . ($_GET['q'] ?? '') . "%";

$stmt = $conn->prepare("SELECT name FROM products WHERE name LIKE ?");
$stmt->bind_param("s", $q);
$stmt->execute();

$result = $stmt->get_result();
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row['name'];
}

header("Content-Type: application/json");
echo json_encode($data);
?>