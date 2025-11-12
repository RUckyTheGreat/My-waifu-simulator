<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO favorites (post_id, image_url, tags, rating)
                               VALUES (:post_id, :image_url, :tags, :rating)");
        $stmt->execute([
            ':post_id' => $_POST['post_id'],
            ':image_url' => $_POST['image_url'],
            ':tags' => $_POST['tags'],
            ':rating' => $_POST['rating']
        ]);

        header("Location: favorites.php");
        exit;
    } catch (PDOException $e) {
        echo "❌ Gagal menyimpan: " . $e->getMessage();
    }
}
?>
