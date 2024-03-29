<?php




$data = ambilData("SELECT santri.*,berkas.*, pendaftaran.*, wali_santri.nama as nama_wali FROM santri INNER JOIN pendaftaran USING(id_santri) INNER JOIN berkas USING(id_santri) INNER JOIN wali_santri USING(id_wali_santri) WHERE status = 1");


if (isset($_POST['submit'])) {
    if (editSantri($_POST) > 0) {
        echo "
        <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data berhasil dirubah',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=santridaftar'
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
                    document.location.href = 'index.php?page=santridaftar'
                })
            </script>";
    }
}


if (isset($_POST['submitproses'])) {
    if (prosesSantri($_POST) > 0) {
        echo "
        <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data berhasil dirubah',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=santridaftar'
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
                    document.location.href = 'index.php?page=santridaftar'
                })
            </script>";
    }
}

?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Santri Diterima</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                <div class="breadcrumb-item">Data Santri Diterima</div>
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
                                            <th class="text-center">Nama Wali Santri</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Tempat Lahir</th>
                                            <th class="text-center">No Hp</th>
                                            <!-- <th class="text-center">Berkas</th> -->
                                            <!-- <th class="text-center">Status</th>
                                            <th class="text-center">Action</th> -->
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) :

                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $d['nama'] ?></td>
                                                <td class="text-center"><?= $d['nama_wali'] ?></td>
                                                <td class="text-center"><?= $d['jk'] ?></td>
                                                <td class="text-center"><?= $d['alamat'] ?></td>
                                                <td class="text-center"><?= $d['tanggal_lahir'] ?></td>
                                                <td class="text-center"><?= $d['tempat_lahir'] ?></td>
                                                <td class="text-center"><?= $d['no_hp'] ?></td>
                                                <!-- <td class="text-center">
                                                    <a href="assets/berkas/<?= $d['nama_berkas'] ?>">
                                                        <button class="btn btn-warning">Berkas</button>
                                                    </a>
                                                </td> -->
                                                <!-- <td class="text-center">
                                                    <button class="btn btn-primary" data-id="<?= $d['id_santri'] ?>" onclick="prosesSantri($(this).data('id'))" data-toggle="modal" data-target="#modalProses">Proses</button>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-success" data-id="<?= $d['id_santri'] ?>" onclick="editSantri($(this).data('id'))" data-toggle="modal" data-target="#exampleModalCenter">
                                                        <i class="fa fa-pen"></i>
                                                    </button>

                                                </td> -->

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
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="idsantri" id="idsantri">


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama Santri : </label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap " />
                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="nama">No Hp Santri : </label>
                                    <input type="text" class="form-control" name="nohp" id="nohp" placeholder="No Hp " />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Jenis Kelamin Santri : </label>
                                    <select class="form-control" name="jk" id="jk">
                                        <option value="Laki - Laki">Laki - laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Tanggal Lahir Santri : </label>
                                    <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal Lahir " />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tempatlahir">Tempat Lahir Santri : </label>
                                    <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" placeholder="Tempat Lahir " />
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat Santri : </label>


                                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="90"></textarea>
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

    <div class="modal fade" id="modalProses" tabindex="-1" role="dialog" aria-labelledby="modalProsesTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Proses Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="idsantriproses" id="idsantriproses">
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="nama">Proses : </label>
                                        <select name="proses" id="proses" class="form-control">
                                            <option value="0">- Pilih -</option>
                                            <option value="1">Diterima</option>
                                            <option value="2">Tidak Diterima</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 masuk">


                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submitproses" class="btn btn-primary">Proses</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    // $(function() {
    //     $("#proses").change(function(e) {
    //         let proses = $(this).val()
    //         $(".masuk").empty()
    //         if (proses == 1) {
    //             let el = $(`


    //                             <div class="col-lg-12">
    //                                 <div class="form-group">
    //                                     <label for="nama">Kamar : </label>
    //                                     <input type="text" class="form-control" name="kamar" id="kamar" placeholder="Masukan Nama Kamar">
    //                                 </div>
    //                             </div>

    //                             <div class="col-lg-12">
    //                                 <div class="form-group">
    //                                     <label for="nama">Keterangan Kamar : </label>
    //                                     <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10" placeholder="Keterangan Kamar"></textarea>
    //                                 </div>
    //                             </div>`)

    //             $(".masuk").append(el)
    //         }
    //     })
    // })

    function prosesSantri(idsantri) {
        $("#idsantriproses").val(idsantri);
    }
</script>