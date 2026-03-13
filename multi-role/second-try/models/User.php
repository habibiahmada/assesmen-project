<?php
class User{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function findUserByName($username) {
        $sql = 'SELECT * FROM users WHERE username = ? LIMIT 1';

        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $user = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        return $user ?: null;

    }

    public function createUser($username, $passwordHash, $role = 'peminjam') {
        $sql = 'INSERT INTO users (username, password, role) VALUES (?, ?, ?)';

        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param($stmt, 'sss', $username, $passwordHash, $role);
        $ok = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $ok;
    }
}