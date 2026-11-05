<?php
require_once "db.php";

if (isset($_POST['delete'])) {
    $id = (int)$_POST['id'];

    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "Product Deleted";
}
?>

<form method="post" onsubmit="return confirm('Delete this product?')">
<input type="number" name="id" placeholder="Product ID" required>
<button name="delete">Delete</button>
</form>