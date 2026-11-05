<?php
$name = $_POST['name'] ?? '';
?>

<form method="post">
<input name="name" placeholder="Enter Name">
<button>Submit</button>
</form>

<h3>
<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
</h3>