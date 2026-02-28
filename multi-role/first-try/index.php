<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test multi role</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="container flex">
        <ul class="flex w-full justify-between items-center">
            <div class="flex gap-4">
                <li>Home</li>
                <li>About</li>
                <li>Contact</li>
            </div>
            <?php
            if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'petugas', 'peminjam'])) {
                // Jika sudah login, tampilkan username dan logout
                echo '<div class="flex gap-4">';
                echo '<li>' . htmlspecialchars($_SESSION['username']) . ' <small>(' . $_SESSION['role'] . ')</small></li>';
                echo '<li><a href="/logout.php">Logout</a></li>';
                echo '</div>';  
            } else {
                // Jika belum login, tampilkan link login dan register
                echo '<div class="flex gap-4">';
                echo '<li><a href="/login">Login</a></li>';
                echo '<li><a href="/register">Register</a></li>';
                echo '</div>';
            }   
            ?>
            </ul>
    </nav>

    <section class="container">
        <h1>Ini Halaman Home</h1>
        <p>Selamat datang di aplikasi multi-role sederhana!</p>
        <p>Silakan login atau register untuk mengakses dashboard sesuai role Anda.</p>
    </section>
</body>
</html>