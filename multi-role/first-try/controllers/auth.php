<?php
session_start();

include __DIR__ . '/../config/koneksi.php';
include __DIR__ . '/../models/User.php';

$userModel = new User($conn);

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $user = $userModel->findByUsername($username);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect berdasarkan role
        if ($user['role'] === 'admin') {
            header('Location: ../admin/dashboard.php');
        } elseif ($user['role'] === 'petugas') {
            header('Location: ../petugas/dashboard.php');
        } else {
            header('Location: ../peminjam/dashboard.php');
        }
        exit();
    }

    header('Location: ../login/index.php?error=invalid_credentials');
    exit();

} elseif ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm  = isset($_POST['confirm-password']) ? $_POST['confirm-password'] : '';

    if ($password !== $confirm) {
        header('Location: ../register/index.php?error=password_mismatch');
        exit();
    }

    if ($userModel->findByUsername($username)) {
        header('Location: ../register/index.php?error=username_taken');
        exit();
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $created = $userModel->createUser($username, $hash, 'peminjam');

    if ($created) {
        header('Location: ../login/index.php?registered=1');
        exit();
    }

    header('Location: ../register/index.php?error=unknown');
    exit();

} else {
    header('Location: ../login/index.php');
    exit();
}

?>
