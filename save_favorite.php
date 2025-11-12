<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_url = $_POST['image_url'];
    $category = $_POST['category'];

    $stmt = $pdo->prepare("INSERT INTO favorites (image_url, category) VALUES (?, ?)");
    $stmt->execute([$image_url, $category]);

    header('Location: favorites.php');
    exit;
}
?>
