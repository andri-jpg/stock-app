<?php

require 'config/db_connect.php';

$sql = "SELECT keluar.idkeluar, keluar.tanggal,keluar.penerima,  stock.namabarang, keluar.qty, keluar.status, foto.path
FROM keluar
INNER JOIN stock ON keluar.idbarang = stock.idbarang
LEFT JOIN foto ON keluar.idkeluar = foto.idkeluar;";

$result = mysqli_query($conn, $sql);

$data_history = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);