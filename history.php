<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'get_stok_barang.php';

require 'get_history.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
        <title>history</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <?php require 'templates/topnavigation.php'; ?>

        <div id="layoutSidenav">
            
            <?php require 'templates/sidenavigation.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-sm-4">
                        <h1 class="my-4">history Cetak</h1>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
                                <div class="py-2">
                                    <i class="fas fa-table me-1"></i>
                                    Riwayat cetak
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                            <th>Tanggal dan Waktu</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Penerima</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php $i = 1; ?>
                                        
                                        <?php foreach($data_history as $item): ?>
                                            <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $item['tanggal']; ?></td>
                                                <td><?php echo $item['namabarang']; ?></td>
                                                <td><?php echo $item['qty']; ?></td>
                                                <td><?php echo $item['penerima']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#lihat<?php echo $item['idkeluar']; ?>">
                                                        Lihat Foto
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="lihat<?php echo $item['idkeluar']; ?>" tabindex="-1" role="dialog" aria-labelledby="lihatFotoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="lihatFotoModalLabel">Lihat Foto</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="<?php echo $item['path']; ?>" class="img-fluid" alt="Foto Bukti Pembayaran">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
                <?php require 'templates/footer.php'; ?>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>