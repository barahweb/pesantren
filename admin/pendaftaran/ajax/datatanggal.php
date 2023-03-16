<?php
require_once '../../include/function.php';

$idtanggal = $_POST['idtanggal'];

$data = ambilData("SELECT * FROM tanggal_pendaftaran WHERE id_tanggal_pendaftaran = {$idtanggal}")[0];
echo json_encode($data);
