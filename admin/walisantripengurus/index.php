<?php




$data = ambilData("SELECT * FROM wali_santri");


if (isset($_POST['submit'])) {
    if (editWaliSantri($_POST) > 0) {
        echo "
        <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data berhasil dirubah',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=walisantripengurus'
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
                    document.location.href = 'index.php?page=walisantripengurus'
                })
            </script>";
    }
}




?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Wali Santri</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                <div class="breadcrumb-item">Wali Santri</div>
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
                                            <th class="text-center">Nama Wali Santri</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Tempat Lahir</th>
                                            <th class="text-center">No Hp</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) :

                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $d['nama'] ?></td>
                                                <td class="text-center"><?= $d['email'] ?></td>
                                                <td class="text-center"><?= $d['alamat'] ?></td>
                                                <td class="text-center"><?= $d['tanggal_lahir'] ?></td>
                                                <td class="text-center"><?= $d['tempat_lahir'] ?></td>
                                                <td class="text-center"><?= $d['no_hp'] ?></td>

                                                <td class="text-center">
                                                    <button class="btn btn-success" data-id="<?= $d['id_wali_santri'] ?>" onclick="editWaliSantri($(this).data('id'))" data-toggle="modal" data-target="#exampleModalCenter">
                                                        <i class="fa fa-pen"></i>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Wali Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="idwalisantri" id="idwalisantri">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="namawali">Nama Wali Santri : </label>
                                    <input type="text" class="form-control" name="namawali" id="namawali" placeholder="Nama Wali Santri " />
                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="emailwali">Email Wali Santri : </label>
                                    <input type="email" class="form-control" name="emailwali" id="emailwali" placeholder="Email Wali Santri " />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nohp">No Hp Wali Santri : </label>
                                    <input type="text" class="form-control" name="nohp" id="nohp" placeholder="No Hp Wali Santri " />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tanggalwali">Tanggal Lahir Wali Santri : </label>
                                    <input type="date" class="form-control" name="tanggalwali" id="tanggalwali" placeholder="Tanggal Lahir " />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tempatlahirwali">Tempat Lahir Wali Santri : </label>
                                    <input type="text" class="form-control" name="tempatlahirwali" id="tempatlahirwali" placeholder="Tempat Lahir " />
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="alamatwali">Alamat Santri : </label>
                                    <textarea name="alamatwali" id="alamatwali" class="form-control" cols="30" rows="90"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <hr>
                                <p style="color:red;font-size:12px;">*Abaikan jika tidak ingin mengganti password</p>
                                <div class="form-group">
                                    <label for="password">Tempat Lahir Santri : </label>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Tempat Lahir " />
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