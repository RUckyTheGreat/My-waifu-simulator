<?php
require 'config.php';
$id = $_GET['id'];
$fav = $pdo->query("SELECT * FROM favorites WHERE id = $id")->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE favorites SET comment = :comment WHERE id = :id");
    $stmt->execute([':comment' => $_POST['comment'], ':id' => $id]);
    header("Location: favorites.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Favorit</title></head>
<body>
    <h1>Edit Catatan</h1>
    <img src="<?= $fav['image_url'] ?>" width="200"><br>
    <form method="POST">
        <textarea name="comment" rows="4" cols="40"><?= htmlspecialchars($fav['comment']) ?></textarea><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
