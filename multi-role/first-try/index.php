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
            <div class="flex gap-4">
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            </div>
        </ul>
    </nav>

    <section class="container">
        <h1>Ini Halaman Home</h1>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    </section>
</body>
</html>