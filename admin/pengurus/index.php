<?php
$data = ambilData("SELECT * FROM pengurus");


if (isset($_POST['submit'])) {

    $email      = $_POST['email'];
    $idpengurus = $_POST['idpengurus'];

    $cekEmail = ambilData("SELECT id_pengurus FROM pengurus WHERE email = '{$email}' AND id_pengurus != {$idpengurus}");
    if (count($cekEmail) > 0) {
        echo "<script>
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Email sudah digunakan',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            document.location.href = 'index.php?page=pengurus'
        })
    </script>";
    } else {
        if (editAdmin($_POST) > 0) {
            echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data berhasil dirubah',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=pengurus'
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
                    document.location.href = 'index.php?page=pengurus'
                })
            </script>";
        }
    }
}

?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengurus</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                <div class="breadcrumb-item">Pengurus</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="index.php?page=tambahpengurus">
                                <button class="btn btn-primary float-right">Tambah Pengurus</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Bidang</th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">No Hp</th>
                                            <th class="text-center">Hak Akses</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) : ?>
                                            <tr>
                                                <td class="text-center"><?= $d['nama'] ?></td>
                                                <td class="text-center"><?= $d['email'] ?></td>
                                                <td class="text-center"><?= $d['bidang'] ?></td>
                                                <td class="text-center"><?= $d['tanggal_lahir'] ?></td>
                                                <td class="text-center"><?= $d['alamat'] ?></td>
                                                <td class="text-center"><?= $d['no_hp'] ?></td>
                                                <td class="text-center"><?= $d['hak_akses'] ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-success" data-id="<?= $d['id_pengurus'] ?>" onclick="editPengurus($(this).data('id'))" data-toggle="modal" data-target="#exampleModalCenter">
                                                        <i class="fa fa-pen"></i>
                                                    </button>
                                                    <button class="btn btn-danger" data-id="<?= $d['id_pengurus'] ?>" onclick="hapusData($(this).data('id'),'pengurus/ajax/hapuspengurus.php','pengurus')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>

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
                                    <label for="nohp">Hak Akses</label>
                                    <select name="hak" id="hak" class="form-control">
                                        <option value="Pengurus">Pengurus</option>
                                        <option value="Pimpinan">Pimpinan</option>
                                    </select>
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