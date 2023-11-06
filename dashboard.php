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
    <style>
        #layoutSidenav_content {
            background-image: url('images/c.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .dashboard-links {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap; 
            gap: 20px;
            margin-top: 20px;
        }

        .dashboard-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-color: ;
            border-radius: 10px;
            padding: 20px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
            width: 280px;
            height: 200px;
        }

        .dashboard-icon {
            font-size: 24px;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .dashboard-link {
                width: 100%; 
                margin-bottom: 10px; 
            }
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <?php require 'templates/topnavigation.php'; ?>
    <div id="layoutSidenav">
        <?php require 'templates/sidenavigation.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-sm-4">
                    <h2 class="display-1 fw-bold text-primary">Dashboard</h2>
                </div>
                <div class="dashboard-links">
                    <a href="home.php" class="dashboard-link btn btn-primary">
                        <i class="fa-solid fa-layer-group dashboard-icon"></i>
                        Stok Spanduk
                    </a>
                    <a href="barang_masuk.php" class="dashboard-link btn btn-success">
                        <i class="fa-solid fa-circle-plus dashboard-icon"></i>
                        Spanduk masuk
                    </a>
                    <a href="history.php" class="dashboard-link btn btn-warning">
                        <i class="fa-solid fa-clock dashboard-icon"></i>
                        History
                    </a>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
