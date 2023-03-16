<?php




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


?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Pendaftaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                <div class="breadcrumb-item">Laporan Pendaftaran</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form class="" id="formadmin" method="post" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tanggal Awal</label>
                                            <input type="date" name="awal" id="awal" value="<?= $awal ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Tanggal Akhir</label>
                                            <input type="date" name="akhir" id="akhir" value="<?= $akhir ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <a href="<?= $link ?>" target="_blank">
                                <button class="btn btn-primary float-right"><i class="fa fa-print"></i></button>
                            </a>
                            <br>
                            <br>
                            <br>
                            <div class="table-responsive">
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
                            </div>
                        </div>
                        <!-- <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->
                    </div>
                </div>

            </div>
        </div>
    </section>





</div>