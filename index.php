<!DOCTYPE html>
<?php
    session_start();

    if (isset($_SESSION['login_o'])) {
        header('Location: verifikasi_op.php');
        exit;
    }

    if (isset($_SESSION['login'])) {
        header('Location: dashboard.php');
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
    <link rel="shortcut icon" href="./images/ico.png" type="image/x-icon" />
    <title>Welcome</title>
    <link href="css/styles.css" rel="stylesheet" />
    <style>

body {
        background-image: url('images/wp.jpg'); 
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

        .landing-container {
            background-color: rgba(255, 255, 255, 0.8); 
            height: 100vh;
            display: flex;
            flex-direction: column; 
            align-items: center; 
        }

        .landing-banner {
            background-image: url('');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
            height: 40vh; 
        }

        .landing-content {
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px; 
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <div class="landing-banner"></div>
        <div class="landing-content">
    <h1 class="mb-5">Nuansa Reklame</h1>
    <a href="login.php" class="px-4 text-black py-2 text-decoration-none rounded-pill fw-bold" style="background-color: #6495ed">Login Admin</a>
    <a href="login_operator.php" class="px-4 text-black py-2 text-decoration-none rounded-pill fw-bold" style="background-color: #6495ed">Login Operator</a>
</div>

    </div>
</body>
</html>
