<?php
require_once "../../include/function.php";

$idpembayaran   =  $_POST['e'];
$idsantri       =  $_POST['f'];

$query              = "DELETE FROM tagihan WHERE id_tagihan = '{$idpembayaran}'";
$query2             = "DELETE FROM pendaftaran WHERE id_santri = '{$idsantri}'";
mysqli_query($koneksi, $query);
mysqli_query($koneksi, $query2);
// return mysqli_affected_rows($koneksi);

echo json_encode(['res' => mysqli_affected_rows($koneksi)]);
