<?php
require 'config/db_connect.php';

$idbarang = $_POST['barang'];
$qty = $_POST['qty'];
$penerima = $_POST['penerima'];

// Dapatkan stok barang sekarang
$sql_cek_stok = "SELECT * FROM stock WHERE idbarang='$idbarang'";
$cek_stok = mysqli_query($conn, $sql_cek_stok);
$data_stok = mysqli_fetch_array($cek_stok);
$stok_sekarang = $data_stok['stock'];

if ($stok_sekarang >= $qty) {
    if ($data_stok['status'] === 'belum_terverifikasi') {
        echo "
            <script>
                alert('Maaf, Anda tidak dapat mencetak karena status belum terverifikasi.');
                window.location.href='cetak_spanduk.php';
            </script>
        ";
    } else {
    $update_stok_sekarang = $stok_sekarang - $qty;

    // Update stok barang
    $sql_update_stok = "UPDATE stock SET stock='$update_stok_sekarang', status='belum_terverifikasi' WHERE idbarang='$idbarang'";
    $updatestokkeluar = mysqli_query($conn, $sql_update_stok);

    // Tambahkan ke tabel "keluar"
    $sql_keluar = "INSERT INTO keluar (idbarang, qty, penerima) VALUES ('$idbarang', '$qty', '$penerima')";
    $addtotable = mysqli_query($conn, $sql_keluar);

    // Dapatkan idkeluar yang baru saja dimasukkan
    $idkeluar = mysqli_insert_id($conn);

    // Simpan foto ke tabel "foto" dengan menghubungkannya ke idkeluar
    if ($_FILES['foto_yang_mau_dicetak']['error'] === 0) {
        $targetDir = 'uploads/';
        $targetFile = $targetDir . basename($_FILES['foto_yang_mau_dicetak']['name']);

        if (move_uploaded_file($_FILES['foto_yang_mau_dicetak']['tmp_name'], $targetFile)) {
            // Masukkan informasi foto ke tabel "foto" dengan idkeluar yang sesuai
            $sql_insert_foto = "INSERT INTO foto (idkeluar, path) VALUES ('$idkeluar', '$targetFile')";
            mysqli_query($conn, $sql_insert_foto);
        } else {
            echo "
                <script>
                    alert('Gagal mengunggah foto!');
                    window.location.href='cetak_spanduk.php';
                </script>
            ";
            exit;
        }
    }

    mysqli_free_result($cek_stok);
    mysqli_close($conn);

    header('Location: cetak_spanduk.php');
}
} else {
    echo "
        <script>
            alert('Stok barang tidak cukup!');
            window.location.href='cetak_spanduk.php';
        </script>
    ";
}

?>
