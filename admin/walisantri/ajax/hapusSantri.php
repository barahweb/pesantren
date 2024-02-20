<?php
require_once "../../include/function.php";

$idpembayaran   =  $_POST['e'];
$idsantri       =  $_POST['f'];

$query              = "UPDATE tagihan SET status = 10 WHERE id_tagihan = '{$idpembayaran}'";
$query2             = "UPDATE pendaftaran SET status = 10 WHERE id_santri = '{$idsantri}'";
mysqli_query($koneksi, $query);
mysqli_query($koneksi, $query2);
// return mysqli_affected_rows($koneksi);

echo json_encode(['res' => mysqli_affected_rows($koneksi)]);
