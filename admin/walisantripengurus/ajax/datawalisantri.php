<?php
require_once "../../include/function.php";
$idwalisantri = $_POST['idwalisantri'];
$data = ambilData("SELECT * FROM wali_santri WHERE id_wali_santri = {$idwalisantri}")[0];
echo json_encode($data);
