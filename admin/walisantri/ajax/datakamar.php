<?php
require_once "../../include/function.php";
$idsantri = $_POST['idsantri'];

$data = [];

$kamar = ambilData("SELECT * FROM kamar WHERE id_santri = {$idsantri}")[0];
$kelas  = ambilData("SELECT * FROM kelas WHERE id_santri = {$idsantri}")[0];

$data = [
    'nama_kamar' => $kamar['nama_kamar'],
    'keterangan' => $kamar['keterangan'],
    'nama_kelas' => $kelas['nama_kelas'],
];


echo json_encode($data);
