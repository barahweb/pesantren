<?php
if ($_SESSION['role'] == 2) {
    $data = ambilData("SELECT tagihan.*,santri.nama FROM tagihan INNER JOIN santri USING(id_santri) INNER JOIN wali_santri USING(id_wali_santri) WHERE santri.id_wali_santri = {$_SESSION['user']}");
} else {
    $data = ambilData("SELECT tagihan.*,santri.nama FROM tagihan INNER JOIN santri USING(id_santri)");
}


if (isset($_POST['submitPembayaran'])) {
    // var_dump(updatepembyaranjpg($_POST));
    if (updatepembyaranjpg($_POST) > 0) {
        echo "
        <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data berhasil dirubah',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=pembayaran'
                })
            </script>";
    } else {
        echo "
        <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Data gagal dirubah',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=pembayaran'
                })
            </script>";
    }
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

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th class="text-center">Nama Santri</th>
                                            <th class="text-center">Nama Tagihan</th>
                                            <th class="text-center">Batas Pembayaran</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Upload Pembayaran</th>

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
                                                <td class="text-center"><?= $d['batas_pembayaran'] ?></td>
                                                <td class="text-center"><?= rupiah($d['harga']) ?></td>
                                                <td class="text-center">
                                                    <?php
                                                        if ($d['status'] == 1) :
                                                            ?>
                                                        <button class="btn btn-success">Sudah Membayar</button>
                                                    <?php elseif($d['status'] == 2) : ?>
                                                        <button class="btn btn-info">Menunggu Proses Pengecekan</button>
                                                    <?php else : ?>
                                                        <button class="btn btn-danger">Belum Membayar</button>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                <?php if($d['status'] == 0) : ?>
                                                    <button class="btn btn-success" data-id="<?= $d['id_santri'] ?>" onclick="uploadBerkasPembayaran($(this).data('id'))" data-toggle="modal" data-target="#modalPembayaran">
                                                        Upload Pembayaran</button>
                                                <?php elseif($d['status'] == 2 || $d['status'] == 1) : ?>
                                                    <a class="btn btn-info" id="download" href="assets/berkas/<?=$d['pdf']; ?>" download="assets/berkas/<?=$d['pdf']; ?>">Download Berkas</a>
                                                    <?php if($_SESSION['role'] == 1 && $d['status'] == 2): ?>
                                                        <button class="btn btn-success" data-id="<?= $d['id_santri'] ?>" onclick="prosesPembayaran($(this).data('id'))">
                                                        Proses Pembayaran</button>

                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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



    <!-- MODAL UPLOAD BERKAS PEMBAYARAN -->
    <div class="modal fade" id="modalPembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="idsantripembayaran" id="idsantripembayaran">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Upload Bukti Pembayaran</label>
                                    <input type="file" class="form-control" name="file" id="file" placeholder="Berkas Pembayaran " />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submitPembayaran" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>