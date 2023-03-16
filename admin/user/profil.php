<?php



// array (size=8)
//   'id_wali_santri' => string '2' (length=1)
//   'nama' => string 'Wali Santri' (length=11)
//   'email' => string 'Walisantri@gmail.com' (length=20)
//   'password' => string '$2y$10$uveYR0lQMnZ46iZ8pT0u2eBSdCuQ5tEiJHI1bBP.Rq56mkXzgvfW6' (length=60)
//   'alamat' => string 'Jepara No 23' (length=12)
//   'tempat_lahir' => string 'Jepara' (length=6)
//   'tanggal_lahir' => string '2021-12-02' (length=10)
//   'no_hp' => string '089123' (length=6)


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
                    document.location.href = 'index.php?page=profil'
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
                    document.location.href = 'index.php?page=profil'
                })
            </script>";
    }
}


?>



<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profil</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                <div class="breadcrumb-item">Profil</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, <?= $user['nama'] ?>!</h2>
            <p class="section-lead">
                Ganti informasi tentang diri anda disini.
            </p>

            <div class="row mt-sm-4">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate="">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <input type="hidden" name="idwalisantri" value="<?= $user['id_wali_santri'] ?>">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="namawali">Nama Wali Santri : </label>
                                            <input type="text" class="form-control" value="<?= $user['nama'] ?>" name="namawali" id="namawali" placeholder="Nama Wali Santri " />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="emailwali">Email Wali Santri : </label>
                                            <input type="email" class="form-control" value="<?= $user['email'] ?>" name="emailwali" id="emailwali" placeholder="Nama Wali Santri " />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nohp">No Hp Wali Santri : </label>
                                            <input type="text" class="form-control" value="<?= $user['no_hp'] ?>" name="nohp" id="nohp" placeholder="Nama Wali Santri " />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="tanggalwali">Tanggal Lahir Wali Santri : </label>
                                            <input type="date" class="form-control" name="tanggalwali" value="<?= $user['tanggal_lahir'] ?>" id="tanggalwali" placeholder="Tanggal Lahir " />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="tempatlahirwali">Tempat Lahir Wali Santri : </label>
                                            <input type="text" class="form-control" name="tempatlahirwali" value="<?= $user['tempat_lahir'] ?>" id="tempatlahirwali" placeholder="Tempat Lahir " />
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="alamatwali">Alamat Santri : </label>
                                            <textarea name="alamatwali" id="alamatwali" class="form-control" cols="30" rows="90"><?= $user['alamat'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <hr>
                                        <p style="color:red;font-size:12px;">*Abaikan jika tidak ingin mengganti password</p>
                                        <div class="form-group">
                                            <label for="password">Password : </label>
                                            <input type="text" class="form-control" name="password" id="password" placeholder="Tempat Lahir " />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>