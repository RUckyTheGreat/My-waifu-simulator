<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>My Favorite Waifus</title>
    <style>
        body { font-family: sans-serif; background: #f9f9f9; text-align: center; }
        img { border-radius: 10px; width: 200px; margin: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.2); }
        form { display:inline-block; margin-top:5px; }
        button { background: #ff4081; color: white; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer; }
    </style>
</head>
<body>

<h1>My istri</h1>

<a href="index.php">⬅️ Back</a><br><br>

<?php
$stmt = $pdo->query("SELECT * FROM favorites ORDER BY created_at DESC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($rows) > 0):
    foreach ($rows as $row): ?>
        <div style="display:inline-block;">
            <img src="<?= htmlspecialchars($row['image_url']) ?>" alt="fav">
            <form action="delete_favorite.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit">🗑️ Delete</button>
            </form>
        </div>
<?php
    endforeach;
else:
    echo "<p>No favorites yet.</p>";
endif;
?>

</body>
</html>
