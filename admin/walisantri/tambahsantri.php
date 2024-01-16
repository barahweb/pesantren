<?php

if (isset($_POST['submit'])) {
    if (tambahSantri($_POST) > 0) {
        echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data berhasil ditambahkan',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                document.location.href = 'index.php?page=tambahsantri'
            })
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Data gagal ditambahkan',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                document.location.href = 'index.php?page=tambahsantri'
            })
        </script>";
    }
}
?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Santri</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="index.php?page=santri">Santri</a></div>
                <div class="breadcrumb-item">Tambah Santri</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form class="" id="formadmin" method="post" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
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
                                                <option value="Laki - laki">Laki - laki</option>
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

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Berkas(pdf/jpg)</label>
                                            <input type="file" class="form-control" name="file" id="file" placeholder="Tempat Lahir " />
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat : </label>
                                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"></textarea>
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
        </div>
    </section>
</div>