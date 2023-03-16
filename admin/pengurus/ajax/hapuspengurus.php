<?php
require_once '../../include/function.php';
$idpengurus = $_POST['id'];

mysqli_query($koneksi, "DELETE FROM pengurus WHERE id_pengurus = {$idpengurus}");
echo json_encode(['hasil' => mysqli_affected_rows($koneksi)]);
