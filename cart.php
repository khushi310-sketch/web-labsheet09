<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add'])) {
    $id = (int)$_POST['id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
}

if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][(int)$_GET['remove']]);
}

foreach ($_SESSION['cart'] as $id => $qty) {
    echo "Product ID: $id | Quantity: $qty ";
    echo "<a href='?remove=$id'>Remove</a><br>";
}
?>

<form method="post">
<input type="number" name="id" placeholder="Product ID" required>
<button name="add">Add to Cart</button>
</form>