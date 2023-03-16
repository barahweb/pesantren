<?php
require_once "include/function.php";

$tahun = date("Y");



$data = [
    "jan" => ambilData("SELECT IFNULL(SUM(tagihan.harga),0) AS total FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN pendaftaran USING(id_santri) WHERE YEAR(pendaftaran.tanggal_daftar) = {$tahun} AND MONTH(pendaftaran.tanggal_daftar) = 1")[0]["total"],
    "feb" => ambilData("SELECT IFNULL(SUM(tagihan.harga),0) AS total FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN pendaftaran USING(id_santri) WHERE YEAR(pendaftaran.tanggal_daftar) = {$tahun} AND MONTH(pendaftaran.tanggal_daftar) = 2")[0]["total"],
    "mar" => ambilData("SELECT IFNULL(SUM(tagihan.harga),0) AS total FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN pendaftaran USING(id_santri) WHERE YEAR(pendaftaran.tanggal_daftar) = {$tahun} AND MONTH(pendaftaran.tanggal_daftar) = 3")[0]["total"],
    "apr" => ambilData("SELECT IFNULL(SUM(tagihan.harga),0) AS total FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN pendaftaran USING(id_santri) WHERE YEAR(pendaftaran.tanggal_daftar) = {$tahun} AND MONTH(pendaftaran.tanggal_daftar) = 4")[0]["total"],
    "mei" => ambilData("SELECT IFNULL(SUM(tagihan.harga),0) AS total FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN pendaftaran USING(id_santri) WHERE YEAR(pendaftaran.tanggal_daftar) = {$tahun} AND MONTH(pendaftaran.tanggal_daftar) = 5")[0]["total"],
    "jun" => ambilData("SELECT IFNULL(SUM(tagihan.harga),0) AS total FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN pendaftaran USING(id_santri) WHERE YEAR(pendaftaran.tanggal_daftar) = {$tahun} AND MONTH(pendaftaran.tanggal_daftar) = 6")[0]["total"],
    "jul" => ambilData("SELECT IFNULL(SUM(tagihan.harga),0) AS total FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN pendaftaran USING(id_santri) WHERE YEAR(pendaftaran.tanggal_daftar) = {$tahun} AND MONTH(pendaftaran.tanggal_daftar) = 7")[0]["total"],
    "agu" => ambilData("SELECT IFNULL(SUM(tagihan.harga),0) AS total FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN pendaftaran USING(id_santri) WHERE YEAR(pendaftaran.tanggal_daftar) = {$tahun} AND MONTH(pendaftaran.tanggal_daftar) = 8")[0]["total"],
    "sep" => ambilData("SELECT IFNULL(SUM(tagihan.harga),0) AS total FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN pendaftaran USING(id_santri) WHERE YEAR(pendaftaran.tanggal_daftar) = {$tahun} AND MONTH(pendaftaran.tanggal_daftar) = 9")[0]["total"],
    "okt" => ambilData("SELECT IFNULL(SUM(tagihan.harga),0) AS total FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN pendaftaran USING(id_santri) WHERE YEAR(pendaftaran.tanggal_daftar) = {$tahun} AND MONTH(pendaftaran.tanggal_daftar) = 10")[0]["total"],
    "nov" => ambilData("SELECT IFNULL(SUM(tagihan.harga),0) AS total FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN pendaftaran USING(id_santri) WHERE YEAR(pendaftaran.tanggal_daftar) = {$tahun} AND MONTH(pendaftaran.tanggal_daftar) = 11")[0]["total"],
    "des" => ambilData("SELECT IFNULL(SUM(tagihan.harga),0) AS total FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN pendaftaran USING(id_santri) WHERE YEAR(pendaftaran.tanggal_daftar) = {$tahun} AND MONTH(pendaftaran.tanggal_daftar) = 12")[0]["total"],
];


echo json_encode($data);
