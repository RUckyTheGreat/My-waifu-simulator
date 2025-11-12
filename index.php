<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Waifu Gallery</title>
    <style>
        body { font-family: sans-serif; text-align: center; background: #f4f4f4; }
        img { border-radius: 12px; width: 300px; margin: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.2); }
        button { margin: 5px; padding: 8px 15px; border: none; background: #ff4081; color: white; border-radius: 6px; cursor: pointer; }
        select { padding: 6px; margin: 10px; }
    </style>
</head>
<body>

<h1>Animek Gallery</h1>

<form method="GET">
    <select name="category">
        <option value="waifu">Waifu</option>
        <option value="neko">Neko</option>
        <option value="shinobu">Shinobu</option>
        <option value="megumin">Megumin</option>
        <option value="bully">Bully</option>
        <option value="cuddle">Cuddle</option>
    </select>
    <button type="submit">Show</button>
</form>

<?php
$category = $_GET['category'] ?? 'waifu';
$response = file_get_contents("http://localhost/MyAnimek/api/waifu_api.php?type=sfw&category={$category}");
$data = json_decode($response, true);

if (isset($data['url'])):
?>
    <div>
        <img src="<?= htmlspecialchars($data['url']) ?>" alt="waifu image">
        <form action="save_favorite.php" method="POST">
            <input type="hidden" name="image_url" value="<?= htmlspecialchars($data['url']) ?>">
            <input type="hidden" name="category" value="<?= htmlspecialchars($category) ?>">
            <button type="submit">menambahkan ke my istri</button>
        </form>
    </div>
<?php else: ?>
    <p>Failed to load image.</p>
<?php endif; ?>

<br>
<a href="favorites.php">View Favorites</a>

</body>
</html>
