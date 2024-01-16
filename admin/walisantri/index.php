<?php




$data = ambilData("SELECT santri.*,pendaftaran.*,wali_santri.id_wali_santri,berkas.* FROM santri INNER JOIN pendaftaran USING(id_santri) INNER JOIN wali_santri USING(id_wali_santri) INNER JOIN berkas USING(id_santri) WHERE santri.id_wali_santri = {$idwalisantri}");


if (isset($_POST['submit'])) {




    if (editSantri($_POST) > 0) {
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data berhasil dirubah',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=walisantri'
                })
            </script>";
    } else {
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Data gagal dirubah',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=walisantri'
                })
            </script>";
    }
}

$dataPendaftaran = ambilData("SELECT * FROM tanggal_pendaftaran")[0];
$sekarang = date("Y-m-d");


$buka = false;

if ($sekarang >= $dataPendaftaran['tanggal_mulai'] && $sekarang  <= $dataPendaftaran['tanggal_selesai']) $buka = true;
?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Santri</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                <div class="breadcrumb-item">Santri</div>
            </div>
        </div>


        <?php if (!$buka) : ?>
            <div class="">
                <div class="alert alert-info alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Tanggal Pendaftaran Santri Belum Dibuka</div>
                        Tanggal pendaftaran dibuka dari tanggal <?= tgl_indo($dataPendaftaran['tanggal_mulai'])  . ' SD ' . tgl_indo($dataPendaftaran['tanggal_selesai']) ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <?php if ($buka) : ?>
                            <div class="card-header">
                                <a href="index.php?page=tambahsantri">
                                    <button class="btn btn-primary float-right">Tambah Santri</button>
                                </a>
                            </div>


                        <?php endif; ?>

                        <div class="card-body">
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
                                            <th class="text-center">Berkas</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) :
                                            $status = "Sedang Diproses";
                                            if ($d['status'] == 1) $status = "Diterima";
                                            $pembayaran = ambilData("SELECT id_tagihan,status FROM tagihan WHERE id_santri = {$d['id_santri']}")[0];

                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $d['nama'] ?></td>
                                                <td class="text-center"><?= $d['jk'] ?></td>
                                                <td class="text-center"><?= $d['alamat'] ?></td>
                                                <td class="text-center"><?= $d['tanggal_lahir'] ?></td>
                                                <td class="text-center"><?= $d['tempat_lahir'] ?></td>
                                                <td class="text-center"><?= $d['no_hp'] ?></td>
                                                <td class="text-center">
                                                    <a href="assets/berkas/<?= $d['nama_berkas'] ?>" terget="_blank">
                                                        <button class="btn btn-info">Lihat Berkas</button>
                                                    </a>


                                                </td>

                                                <td class="text-center">
                                                <?php 
                                                if ($d['status'] == '1'):
                                                ?>
                                                    <span class="badge badge-success">Santri Diterima</span>
                                                <?php 
                                                    elseif ($d['status'] == '2') : ?>
                                                    <span class="badge badge-danger">Santri Ditolak</span>
                                                
                                                    <?php else :  ?>
                                                        <span class="badge badge-info">Sedang Diproses</span>
                                                <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($d['status'] == 1) : ?>

                                                        <?php if (count($pembayaran)) : ?>
                                                            <?php if($pembayaran['status'] == 1): ?>
                                                                <button class="btn btn-success">Lunas</button>
                                                            <?php elseif($pembayaran['status'] == 2) : ?>
                                                                <button class="btn btn-warning">Menunggu Pembayaran</button>

                                                            <?php endif; ?>
                                                            <!-- <button class="btn btn-danger" data-id="<?= $d['id_santri'] ?>" onclick="lanjutPembayaran($(this).data('id'))">Lanjut Pembayaran</button> -->
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php 
                                                        if ($d['status'] == '0' || $d['status'] == '2'):
                                                    ?>
                                                    <button class="btn btn-success" data-id="<?= $d['id_santri'] ?>" data-pendaftaran="<?=$d['id_pendaftaran']; ?>" onclick="editSantri($(this).data('id'), $(this).data('pendaftaran'))" data-toggle="modal" data-target="#modalsantri">
                                                        <i class="fa fa-pen"></i>
                                                    </button>

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





    <!-- Modal Santri -->
    <div class="modal fade" id="modalsantri" tabindex="-1" role="dialog" aria-labelledby="modalsantriTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Kamar & Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="idsantri" id="idsantri">
                            <input type="hidden" name="idpendaftaran" id="idpendaftaran">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Santri</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>No Hp</label>
                                    <input type="text" name="nohp" id="nohp" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jk" id="jk">
                                        <option value="Laki - Laki">Laki - laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" required>
                                </div>
                            </div>



                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat : </label>
                                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" required></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <hr>
                                <p style="color:red;font-size:12px;">*Abaikan jika tidak ingin mengganti file</p>
                                <div class="form-group">
                                    <label>Upload Foto/Berkas Ijazah Pendidikan Terakhir</label>
                                    <input type="file" class="form-control" name="file" id="file" placeholder="File Berkas " />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Kamar & Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="idpengurus" id="idpengurus">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Kamar</label>
                                <input type="text" name="kamar" id="kamar" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="kelas">Nama Kelas</label>
                                <input class="form-control" type="text" name="kelas" id="kelas" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan Kamar</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>