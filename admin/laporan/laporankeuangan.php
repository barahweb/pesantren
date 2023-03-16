<?php




$awal = "";
$akhir = "";

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


?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pembayaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                <div class="breadcrumb-item">Pembayaran</div>
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




    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Pengurus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="idpengurus" id="idpengurus">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Pengurus</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" required>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Lahir</label>
                                    <input class="form-control" type="date" name="tanggal" id="tanggal" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nohp">No Hp</label>
                                    <input class="form-control" type="text" name="nohp" id="nohp" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="bidang">Bidang</label>
                                    <input class="form-control" type="text" name="bidang" id="bidang" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" required></textarea>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <hr>
                                    <p>*Abaikan jika tidak ingin mengganti password</p>
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" id="password">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>