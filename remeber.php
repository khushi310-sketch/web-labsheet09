<?php
if (isset($_POST['remember'])) {
    setcookie("username", $_POST['name'], time() + 86400, "/", "", false, true);
}

$name = $_COOKIE['username'] ?? '';
?>

<form method="post">
<input name="name" placeholder="Your Name">
<label><input type="checkbox" name="remember"> Remember Me</label>
<button>Submit</button>
</form>

<h3>Welcome <?= htmlspecialchars($name) ?></h3>