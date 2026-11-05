<?php
require_once "db.php";

$name = "%" . ($_GET['name'] ?? '') . "%";
$category = "%" . ($_GET['category'] ?? '') . "%";
$min = (float)($_GET['min'] ?? 0);
$max = (float)($_GET['max'] ?? 999999);

$stmt = $conn->prepare(
    "SELECT * FROM products WHERE name LIKE ? AND category LIKE ? AND price BETWEEN ? AND ?"
);
$stmt->bind_param("ssdd", $name, $category, $min, $max);
$stmt->execute();

$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo htmlspecialchars($row['name']) . " - " . $row['price'] . "<br>";
}
?>

<form>
<input name="name" placeholder="Product Name">
<input name="category" placeholder="Category">
<input name="min" type="number" placeholder="Min Price">
<input name="max" type="number" placeholder="Max Price">
<button>Search</button>
</form>