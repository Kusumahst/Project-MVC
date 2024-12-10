<!DOCTYPE html>
<html>
<head>
    <title>Detail</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <h2>Detail Item</h2>
    <p><b>Nama      :</b> <?= htmlspecialchars($item['name']) ?></p>
    <p><b>Deskripsi :</b> <?= htmlspecialchars($item['description']) ?></p>
    <p><b>Harga     :</b> <?= number_format($item['price'], 0, '', '.') ?></p>

    <?php if ($item['image']): ?>
        <img src="/PROJECT_MVC/public/uploads/<?= htmlspecialchars($item['image']) ?>" alt="Item Image" width="300px" class="img">
    <?php else: ?>
        <p>Gambar tidak tersedia.</p>
    <?php endif; ?>

    <p></P>
    <a href="index.php">Kembali</a>
</body>
</html>
