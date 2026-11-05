<?php
require_once "db.php";

$sort = $_GET['sort'] ?? 'name';
$order = $_GET['order'] ?? 'ASC';

$columns = ['name', 'price', 'category'];

if (!in_array($sort, $columns)) $sort = 'name';
if (!in_array($order, ['ASC', 'DESC'])) $order = 'ASC';

$result = $conn->query("SELECT * FROM products ORDER BY $sort $order");

while ($row = $result->fetch_assoc()) {
    echo htmlspecialchars($row['name']) . " - " . $row['price'] . "<br>";
}
?>

<a href="?sort=name&order=ASC">Name ↑</a>
<a href="?sort=price&order=DESC">Price ↓</a>