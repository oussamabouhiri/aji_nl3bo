<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <div>
            <h1>Welcome to the Home Page</h1>
            <p>This is a simple home page.</p>
            <ul>
                <li><a href="<?= App\Helper\Utility::url('/login') ?>">Login</a></li>
                <li><a href="<?= App\Helper\Utility::url('/register') ?>">Register</a></li>
            </ul>
        </div>
    </main>
</body>
</html>