<?php
$data = ambilData("SELECT * FROM tanggal_pendaftaran");


if (isset($_POST['submit'])) {


    if (editTanggal($_POST) > 0) {
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data berhasil dirubah',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=tanggalpendaftaran'
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
                    document.location.href = 'index.php?page=tanggalpendaftaran'
                })
            </script>";
    }
}

?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tanggal Pendaftaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                <div class="breadcrumb-item">Tanggal Pendaftaran</div>
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
                                            <th class="text-center">Tanggal Mulai</th>
                                            <th class="text-center">Tanggal Selesai</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) : ?>
                                            <tr>
                                                <td class="text-center"><?= $d['tanggal_mulai'] ?></td>
                                                <td class="text-center"><?= $d['tanggal_selesai'] ?></td>

                                                <td class="text-center">
                                                    <button class="btn btn-success" data-id="<?= $d['id_tanggal_pendaftaran'] ?>" onclick="editTanggal($(this).data('id'))" data-toggle="modal" data-target="#exampleModalCenter">
                                                        <i class="fa fa-pen"></i>
                                                    </button>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Tanggal Pendaftaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="idtanggalpendaftaran" id="idtanggalpendaftaran">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" name="mulai" id="mulai" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="selesai">Tanggal Selesai</label>
                                    <input class="form-control" type="date" name="selesai" id="selesai" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>