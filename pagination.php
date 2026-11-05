<?php
require_once "db.php";

$page = max(1, (int)($_GET['page'] ?? 1));
$limit = 5;
$offset = ($page - 1) * $limit;

$result = $conn->query("SELECT * FROM products LIMIT $limit OFFSET $offset");

while ($row = $result->fetch_assoc()) {
    echo htmlspecialchars($row['name']) . "<br>";
}

$total = $conn->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];
$pages = ceil($total / $limit);

for ($i = 1; $i <= $pages; $i++) {
    echo "<a href='?page=$i'>$i</a> ";
}
?>