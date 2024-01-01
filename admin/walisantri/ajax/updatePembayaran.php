<?php
require_once "../../include/function.php";

$idsantri   =  $_POST['e'];;

$query          = "UPDATE tagihan SET status = 1 WHERE id_santri = {$idsantri} AND status = 2";
mysqli_query($koneksi, $query);
// return mysqli_affected_rows($koneksi);

echo json_encode(['res' => mysqli_affected_rows($koneksi)]);
