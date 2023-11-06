<?php

require 'config/db_connect.php';

$idbarang = $_POST['idbarang'];
$status =  $_POST['status'];

$sql_edit = "UPDATE stock SET status='$status' WHERE idbarang='$idbarang'";
$edit_barang = mysqli_query($conn, $sql_edit);

mysqli_close($conn);

header('Location: verifikasi_op.php');

?>