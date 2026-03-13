<?php
/**
 * Simple seeder for users table. Run from CLI: php scripts/seed_users.php
 * Adjust DB credentials in config/koneksi.php if needed.
 */
include __DIR__ . '/../config/koneksi.php';

$users = [
    ['username' => 'admin1', 'password' => 'adminpass', 'role' => 'admin'],
    ['username' => 'petugas1', 'password' => 'petugaspass', 'role' => 'petugas'],
    ['username' => 'user1', 'password' => 'userpass', 'role' => 'peminjam'],
];

foreach ($users as $u) {
    $username = $u['username'];
    // check exists
    $check = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ? LIMIT 1");
    mysqli_stmt_bind_param($check, 's', $username);
    mysqli_stmt_execute($check);
    $res = mysqli_stmt_get_result($check);
    $exists = mysqli_fetch_assoc($res);
    mysqli_stmt_close($check);

    if ($exists) {
        echo "User {$username} already exists\n";
        continue;
    }

    $hash = password_hash($u['password'], PASSWORD_DEFAULT);
    $insert = mysqli_prepare($conn, "INSERT INTO users (username, password,     role) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($insert, 'sss', $username, $hash, $u['role']);
    $ok = mysqli_stmt_execute($insert);
    mysqli_stmt_close($insert);

    echo ($ok ? "Inserted {$username}\n" : "Failed insert {$username}\n");
}

?>
