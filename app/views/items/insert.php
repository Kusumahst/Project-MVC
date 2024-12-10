<html>
<head>
    <title>Detail</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <h2>Upload</h2>
    <p>Silakan masukkan item yang ingin ditambahkan</p>

    <form action="index.php?action=insert" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Nama Item" required>
        <input type="text" name="description" placeholder="Deskripsi Item" required>
        <input type="text" name="price" placeholder="Harga"required>
        <input type="file" name="image" required>
        <input type="submit" value="unggah">
    </form>

    <p></P>
    <a href="index.php">Kembali</a>
</body>
</html>