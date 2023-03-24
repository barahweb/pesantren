<?php
require_once "../../include/function.php";
if (isset($_POST["submit"])) {
    $awal   = $_POST["awal"];
    $akhir  = $_POST["akhir"];

    $link = "laporan/cetak/laporankeuangan.php?awal={$awal}&akhir={$akhir}";

    $query  = "SELECT tagihan.*,santri.nama,pendaftaran.tanggal_daftar FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN wali_santri USING(id_wali_santri) INNER JOIN pendaftaran USING(id_santri) WHERE tagihan.status = 1 AND pendaftaran.tanggal_daftar BETWEEN '{$awal}' AND '{$akhir}'";
    $data   = ambilData($query);
} else {
    $link = 'laporan/cetak/laporankeuangan.php';
    $data = ambilData("SELECT tagihan.*,santri.nama,pendaftaran.tanggal_daftar FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN wali_santri USING(id_wali_santri) INNER JOIN pendaftaran USING(id_santri) WHERE tagihan.status = 1");
}


$pengurus = ambilData("SELECT * FROM pengurus WHERE id_pengurus = {$_SESSION['user']}")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Pembayaran</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body onload="window.print();">

    <table>
        <div class="kontain">
            <div class="isi" style="position:relative;">
                <img src="../../assets/img/logo-ngawi.png" alt="" style="float:left;height:115px;position:absolute;left:-40px;">
                <p style="text-align:center"><span style="font-family:Times New Roman,Times,serif">
                        <font size="8">PONPES NURUL IMAN</font>
                    </span></p>
                <p style="text-align:center"><span style="font-size:15px">Sudimoro, Timbulharjo, Kec. Sewon, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55185</span></p>
            </div>
        </div>

        <hr style="border:1.5px solid black;">

        <h4 class="text-center mt-5" style="text-decoration:underline;">LAPORAN PEMBAYARAN</h4>
        <?php if (isset($_GET['awal']) && isset($_GET['akhir'])) { ?>
            <h6 class="text-center"><?= $_GET['awal'] . " / " . $_GET['akhir'] ?></h6>
        <?php } ?>
        <hr>
        <table id="mytable" class="table table-bordered table-md">
            <thead>
                <tr>
                <tr>
                    <th class="text-center">Nama Santri</th>
                    <th class="text-center">Nama Tagihan</th>
                    <th class="text-center">Tanggal Pendaftaran</th>
                    <th class="text-center">Harga</th>

                </tr>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) :
                    $status = "Sedang Diproses";
                    if ($d['status'] == 1) $status = "Diterima";
                    ?>
                    <tr>
                        <td class="text-center"><?= $d['nama'] ?></td>
                        <td class="text-center"><?= $d['nama_tagihan'] ?></td>
                        <td class="text-center"><?= $d['tanggal_daftar'] ?></td>
                        <td class="text-center"><?= rupiah($d['harga']) ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>



        <p class="text-right">
            Yogyakarta, <?= date("Y-m-d") ?>
        </p>

        <br>
        <br>
        <br>
        <br>
        <p class="text-right" style="font-weight: bold;">
            <?= $pengurus['nama'] ?>
        </p>

</body>

</html>