<?php
require_once "db.php";
$result = $conn->query("SELECT * FROM products");
?>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Category</th><th>Price</th></tr>

<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= htmlspecialchars($row['name']) ?></td>
<td><?= htmlspecialchars($row['category']) ?></td>
<td><?= $row['price'] ?></td>
</tr>
<?php } ?>
</table>