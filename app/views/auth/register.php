<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <h2>Register</h2>
    <p><b>Silakan masukkan username dan password untuk membuat akun</b></p>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="index.php?action=register" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required> <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required> <br><br>
      
        <input type="submit" value="Daftar">
    </form>

    <p>Sudah punya akun?</p>
    <a class="btn" href="index.php?action=login">Masuk</a>
</body>
</html>