<?php
require_once "../../include/function.php";
$idpengurus = $_POST['idpengurus'];

$data = ambilData("SELECT * FROM pengurus WHERE id_pengurus = {$idpengurus}")[0];
echo json_encode($data);
