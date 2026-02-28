<?php
session_start();

// Jika sudah register dan role valid, redirect ke dashboard sesuai role
if (isset($_SESSION['user_id']) && isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'petugas', 'peminjam'])) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: ../admin/dashboard.php');
        exit();
    } else if ($_SESSION['role'] === 'petugas') {
        header('Location: ../petugas/dashboard.php');
        exit();
    } else if ($_SESSION['role'] === 'peminjam') {
        header('Location: ../peminjam/dashboard.php');
        exit();
    }   
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main class="auth-page">
        <section class="container auth-card">
            <h1 class="text-center">Register</h1>
            <p class="text-center auth-subtitle">Silakan register untuk melanjutkan</p>

            <form action="../controllers/auth.php?action=register" method="post" class="auth-form">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm-password">Konfirmasi Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>

                <button type="submit">Register</button>
            </form>
            <?php if(isset($_GET['error'])): ?>
                <p style="color:#b91c1c;margin-top:10px;">Registrasi gagal: <?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>

            <div class="auth-links">
                <a href="../login/index.php">Login</a>
                <a href="../index.php">Home</a>
            </div>
        </section>
    </main>
</body>
</html>
