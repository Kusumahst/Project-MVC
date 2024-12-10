<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <h2>Halo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Silakan tambahkan item dengan klik di bawah ini:</p>
    <a class="btn" href="index.php?action=insert">Tambah Item</a>
    <a class="btn" href="index.php?action=logout">Logout</a> <br> <br>
    <table>
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Opsi</th>
        </tr>
        <?php foreach ($items as $item): ?>
        <tr>
            <td>
                <?php if (!empty($item['image'])): ?>
                    <img src="public/uploads/<?= htmlspecialchars($item['image']) ?>" alt="Gambar Item" width="100px">
                <?php else: ?>
                    <p>Gambar tidak tersedia.</p>
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td class="description"><?= htmlspecialchars($item['description']) ?></td>
            <td><?= number_format($item['price'], 0, '', '.') ?></td>
            <td>
                <a class="bttn" href="index.php?action=detail&id=<?= $item['id'] ?>">Detail</a> |
                <a class="bttn" href="index.php?action=edit&id=<?= $item['id'] ?>">Edit</a> |
                <a class="bttn" href="index.php?action=delete&id=<?= $item['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
