<?php
require_once "db.php";

if (isset($_POST['upload'])) {
    $file = $_FILES['image'];

    $allowed = ['image/jpeg', 'image/png'];
    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);

    if ($file['size'] <= 2 * 1024 * 1024 && in_array($mime, $allowed)) {
        if (!is_dir("uploads")) mkdir("uploads");

        $name = bin2hex(random_bytes(8)) . ".jpg";
        move_uploaded_file($file['tmp_name'], "uploads/" . $name);

        echo "Image Uploaded";
    } else {
        echo "Invalid image";
    }
}
?>

<form method="post" enctype="multipart/form-data">
<input type="file" name="image" required>
<button name="upload">Upload</button>
</form>