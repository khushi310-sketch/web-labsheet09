<?php
require_once "db.php";

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO products(name,category,price) VALUES(?,?,?)");
    $stmt->bind_param("ssd", $name, $category, $price);

    echo $stmt->execute() ? "Product Added" : "Error";
}
?>

<form method="post">
<input name="name" placeholder="Product Name">
<input name="category" placeholder="Category">
<input name="price" type="number" step="0.01" placeholder="Price">
<button name="save">Save</button>
</form>