<?php
session_start();
require_once "db.php";

$user = $_SESSION['user'] ?? 0;

if (!$user || empty($_SESSION['cart'])) die("Login and add products first");

try {
    $conn->begin_transaction();

    foreach ($_SESSION['cart'] as $id => $qty) {
        $stmt = $conn->prepare("SELECT price FROM products WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $product = $stmt->get_result()->fetch_assoc();

        if (!$product) throw new Exception("Product not found");

        $total = $product['price'] * $qty;

        $stmt = $conn->prepare(
            "INSERT INTO orders(user_id,product_id,quantity,total) VALUES(?,?,?,?)"
        );
        $stmt->bind_param("iiid", $user, $id, $qty, $total);
        $stmt->execute();
    }

    $conn->commit();
    unset($_SESSION['cart']);
    echo "Order Successful";

} catch (Throwable $e) {
    $conn->rollback();
    echo "Checkout Failed";
}
?>