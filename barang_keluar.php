<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'get_stok_barang.php';

require 'get_barang_keluar.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       
        <meta name="author" content="-" />
        <link rel="shortcut icon" href="./images/ico.png" type="image/x-icon" />
        <title>Barang Keluar</title>
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
                        <h1 class="my-4">Cetak Spanduk</h1>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
                                <div class="py-2">
                                    <i class="fas fa-table me-1"></i>
                                    Data cetak spanduk
                                </div>
                                <button type="button" class="btn btn-primary mr-auto" data-bs-toggle="modal" data-bs-target="#tambah">
                                    Cetak spanduk
                                </button>
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
                                        <?php foreach($data_barang_keluar as $item): ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $item['tanggal']; ?></td>
                                                <td><?php echo $item['namabarang']; ?></td>
                                                <td><?php echo $item['qty']; ?></td>
                                                <td><?php echo $item['penerima']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $item['idkeluar']; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $item['idkeluar']; ?>">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>

                                            <?php $i++; ?>

                                            <div class="modal fade" id="edit<?php echo $item['idkeluar']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Barang : <?php echo $item['namabarang']; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="edit_barang_keluar.php">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="idbarang" value="<?php echo $item['idbarang']; ?>">
                                                                <input type="hidden" name="idkeluar" value="<?php echo $item['idkeluar']; ?>">
                                                                <label class="mb-1">Jumlah barang :</label>
                                                                <input type="text" name="qty" value="<?php echo $item['qty']; ?>" min="1" class="form-control mb-3" required />
                                                                <label class="mb-1">Penerima :</label>
                                                                <input type="text" name="penerima" value="<?php echo $item['penerima']; ?>" class="form-control mb-3" required />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="hapus<?php echo $item['idkeluar']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="hapus_barang_keluar.php">
                                                            <div class="modal-body">
                                                                <p>Apakah anda yakin ingin menghapus <?php echo $item['namabarang']; ?> ?</p>
                                                                <input type="hidden" name="idbarang" value="<?php echo $item['idbarang']; ?>">
                                                                <input type="hidden" name="idkeluar" value="<?php echo $item['idkeluar']; ?>">
                                                                <input type="hidden" name="qty" value="<?php echo $item['qty']; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                                            </div>
                                                        </form>
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

        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cetak spanduk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php foreach($data_stok_barang as $data): ?>
                    <?php if ($data['status'] == 'belum_terverifikasi'): ?>
                        <div style="background-color: #FFCCCC; padding: 10px;">
    <p style="color: red; font-weight: bold;">Maaf, Anda tidak dapat memcetak karena status belum terverifikasi.</p>
            </div> <?php else: ?>
                    <form method="POST" action="tambah_barang_keluar.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="barang"></label>
                        <input type="hidden" name="idbarang" value="<?php echo $item['idbarang']; ?>">
                        <input type="hidden" name="idkeluar" value="<?php echo $item['idkeluar']; ?>">
                        <select name="barang" class="form-control">
                            <?php foreach($data_stok_barang as $item): ?>
                                <option value="<?php echo $item['idbarang']; ?>"><?php echo $item['namabarang']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty"></label>
                        <input type="number" name="qty" placeholder="Jumlah barang cm" min="1" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="penerima"></label>
                        <input type="text" name="penerima" placeholder="Penerima" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="foto">Unggah Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto_yang_mau_dicetak" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">cetak</button>
                </div>
            </form>
            <?php endif; ?>
<?php endforeach; ?>
                </div>
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
