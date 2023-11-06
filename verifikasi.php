<?php

require 'config/db_connect.php';

$idbarang = $_POST['idbarang'];
$verif = 'terverifikasi';

$sql_edit = "UPDATE stock SET status='$verif' WHERE idbarang='$idbarang'";
$edit_barang = mysqli_query($conn, $sql_edit);

mysqli_close($conn);

header('Location: verifikasi_op.php');

?>