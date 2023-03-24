<?php
require_once "../../include/function.php";
$idsantri = $_POST['idsantri'];

$data = ambilData("SELECT *  FROM santri WHERE id_santri = {$idsantri}")[0];

echo json_encode($data);
