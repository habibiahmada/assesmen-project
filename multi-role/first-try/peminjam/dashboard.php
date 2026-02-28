<?php
session_start();

// Proteksi: hanya peminjam yang bisa akses
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'peminjam') {
    header('Location: ../login/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjam Dashboard</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <nav class="container flex">
        <ul class="flex w-full justify-between items-center">
            <div class="flex gap-4">
                <li><strong>Peminjam Dashboard</strong></li>
            </div>
            <div class="flex gap-4">
                <li><?php echo htmlspecialchars($_SESSION['username']); ?> <small>(<?php echo $_SESSION['role']; ?>)</small></li>
                <li><a href="../logout.php">Logout</a></li>
            </div>
        </ul>
    </nav>
    <section class="container">
        <h1>Selamat Datang, Peminjam!</h1>
        <p>Anda login sebagai: <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
        <p>Role: <strong><?php echo $_SESSION['role']; ?></strong> | User ID: <strong><?php echo $_SESSION['user_id']; ?></strong></p>

        <h2>Fitur Peminjam:</h2>
        <ul>
            <li>Cari dan Lihat Alat Tersedia</li>
            <li>Ajukan Peminjaman</li>
            <li>Lihat Status Peminjaman</li>
            <li>Lihat Riwayat Peminjaman</li>
        </ul>

        <p style="margin-top: 20px;">
            <a href="../index.php">← Kembali ke Home</a>
        </p>
    </section>
    </section>
</body>
</html>