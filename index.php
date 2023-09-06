<!DOCTYPE html>
<?php
    session_start();

    if (isset($_SESSION['login'])) {
        header('Location: home.php');
        exit;
    }

    session_destroy();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="-" />
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
    <title>Welcome</title>
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        /* CSS untuk styling tambahan */
        .landing-container {
            background-image: url('wp.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .landing-content {
            background-color: rgba(255, 255, 255, 0.8); /* Latar belakang semi-transparan */
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .landing-banner {
            /* CSS untuk styling banner jika diperlukan */
        }

        .landing-banner {
            background-image: url('b.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
            height: auto; 
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <div class="landing-content">
            <h1 class="mb-5">Nuansa Reklame</h1>
            <a href="login.php" class="px-4 text-black py-2 text-decoration-none rounded-pill fw-bold" style="background-color: #6495ed">Login here</a>
        </div>
        <div class="landing-banner"></div>
    </div>
</body>
</html>