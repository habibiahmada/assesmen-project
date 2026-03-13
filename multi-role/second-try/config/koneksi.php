<?
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'ukk_db';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die('Database error: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');

?>