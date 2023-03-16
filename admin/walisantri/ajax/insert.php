<?php
require_once "../../include/function.php";



$idsantri       = $_POST['idsantri'];
$payment        = json_decode($_POST['data'], true);
$idpemesanan    = $payment['order_id'];
$pdf            = $payment['pdf_url'];
$tanggal        = date("Y-m-d", strtotime("+7 day"));
$harga          = HARGA;

$query = "INSERT INTO tagihan VALUES('{$idpemesanan}',{$idsantri},'Pembayaran Santri Baru','{$tanggal}',{$harga},'{$pdf}',0)";
mysqli_query($koneksi, $query);

echo json_encode(['res' => mysqli_affected_rows($koneksi)]);
