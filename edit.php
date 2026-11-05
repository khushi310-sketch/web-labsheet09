<?php
require_once "db.php";

$id = (int)($_GET['id'] ?? 0);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE products SET name=?, price=? WHERE id=?");
    $stmt->bind_param("sdi", $name, $price, $id);
    $stmt->execute();

    echo "Product Updated";
}

$stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();
?>

<form method="post">
<input name="name" value="<?= htmlspecialchars($row['name'] ?? '') ?>">
<input name="price" value="<?= $row['price'] ?? '' ?>">
<button name="update">Update</button>
</form>