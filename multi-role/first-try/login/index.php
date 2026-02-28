<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main class="auth-page">
        <section class="container auth-card">
            <h1 class="text-center">Login</h1>
            <p class="text-center auth-subtitle">Silakan login untuk melanjutkan</p>

            <form action="#" method="post" class="auth-form">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>

            <div class="auth-links">
                <a href="../register/index.php">Register</a>
                <a href="../index.php">Home</a>
            </div>
        </section>
    </main>
</body>
</html>
