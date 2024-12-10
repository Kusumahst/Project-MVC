
<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <h2>Edit Item</h2>
    <p>Silakan melakukan perubahan pada item</p>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="text" name="name" value="<?= htmlspecialchars($item['name']) ?>" placeholder="Nama Item" required>
        <input type="text" name="description" value="<?= htmlspecialchars($item['description']) ?>" placeholder="Deskripsi Item" required> 
        <input type="text" name="price" value="<?= number_format($item['price'], 0, '', '.') ?>" placeholder="Harga"required>
        <input type="file" name="image">
        <input type="submit" value="Update">

        <?php if (!empty($item['image'])): ?>
    <p>Gambar saat ini:</p>
    <img src="/PROJECT_MVC/public/uploads/<?= htmlspecialchars($item['image']) ?>" alt="Gambar Lama" width="200px">
<?php endif; ?>


    </form>

    <p></P>
    <a href="index.php">Kembali</a>
</body>
</html>