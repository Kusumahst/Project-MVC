
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
<h2>Login</h2>
    <p><b>Silakan masukkan username dan password.</b></p>

    <form action="index.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required> <br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required> <br><br>

        <input type="submit" value="Masuk">
    </form>

    <p>Belum punya akun?</p>
    <a class="btn" href="index.php?action=register">Daftar</a>
</body>
</html>
