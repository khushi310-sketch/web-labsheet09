<?php
session_start();
require_once "db.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid Login";
    }
}
?>

<form method="post">
<input name="email" type="email" placeholder="Email">
<input name="password" type="password" placeholder="Password">
<button name="login">Login</button>
</form>