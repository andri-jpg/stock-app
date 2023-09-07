<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'get_stok_barang.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="-" />
    <link rel="shortcut icon" href="./images/ico.png" type="image/x-icon" />
    <title>Stok Barang</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/scripts.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <?php require 'templates/topnavigation.php'; ?>

    <div id="layoutSidenav">
        <?php require 'templates/sidenavigation.php'; ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-sm-4">
                    <!-- Banner panjang di atas -->
                    <img src="images/c.jpeg" alt="Banner" class="img-fluid float-end mx-3 my-3" style="max-width: 100%; height: auto; border: 1px solid #ccc;"/>

                    <!-- Tombol-tombol di bawah banner -->
                    <div class="text-start">
                        <a href="index.php" class="btn btn-primary btn-lg mb-3">
                            <i class="fa-solid fa-layer-group me-2"></i> Stok Spanduk
                        </a>
                        <a href="barang_masuk.php" class="btn btn-success btn-lg mb-3">
                            <i class="fa-solid fa-circle-plus me-2"></i> Spanduk masuk
                        </a>
                        <a href="barang_keluar.php" class="btn btn-danger btn-lg mb-3">
                            <i class="fa-solid fa-circle-minus me-2"></i> Cetak Spanduk
                        </a>
                        <a href="history.php" class="btn btn-warning btn-lg mb-3">
                            <i class="fa-solid fa-clock me-2"></i> History
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
