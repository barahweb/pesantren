<?php
require_once "../../include/function.php";


$awal = "";
$akhir = "";

if (isset($_POST["submit"])) {
    $awal   = $_POST["awal"];
    $akhir  = $_POST["akhir"];

    $link   = "laporan/cetak/laporanpendaftaran.php?awal={$awal}&akhir={$akhir}";

    $query  = "SELECT * FROM santri INNER JOIN pendaftaran USING(id_santri) WHERE pendaftaran.tanggal_daftar BETWEEN '{$awal}' AND '{$akhir}'";

    $data   = ambilData($query);
} else {
    $link = 'laporan/cetak/laporanpendaftaran.php';
    $data = ambilData("SELECT * FROM santri INNER JOIN pendaftaran USING(id_santri)");
}


$pengurus = ambilData("SELECT * FROM pengurus WHERE id_pengurus = {$_SESSION['user']}")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Pendaftaran</title>
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

        <h4 class="text-center mt-5" style="text-decoration:underline;">LAPORAN PENDAFTARAN</h4>
        <?php if (isset($_GET['awal']) && isset($_GET['akhir'])) { ?>
            <h6 class="text-center"><?= $_GET['awal'] . " / " . $_GET['akhir'] ?></h6>
        <?php } ?>
        <hr>
        <table id="mytable" class="table table-bordered table-md">
            <thead>
                <tr>
                <tr>
                    <th class="text-center">Nama Santri</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Tempat Lahir</th>
                    <th class="text-center">No Hp</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Tanggal Pendaftaran</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) :
                    $status = 'Belum Diproses';
                    if ($d['status'] == 1) $status = 'Diterima';
                    if ($d['status'] == 2) $status = 'Tidak Diterima';
                    ?>
                    <tr>
                        <td class="text-center"><?= $d['nama'] ?></td>
                        <td class="text-center"><?= $d['jk'] ?></td>
                        <td class="text-center"><?= $d['alamat'] ?></td>
                        <td class="text-center"><?= $d['tanggal_lahir'] ?></td>
                        <td class="text-center"><?= $d['tempat_lahir'] ?></td>
                        <td class="text-center"><?= $d['no_hp'] ?></td>
                        <td class="text-center">
                            <?= $status ?>
                        </td>
                        <td class="text-center"><?= $d['tanggal_daftar'] ?></td>




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