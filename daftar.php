<?php

if (isset($_POST['submit'])) {

    if (tambahWaliSantri($_POST) > 0) {
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Berhasil melakukan pendaftaran, Akan di redirect ke halaman login.',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'admin/login.php'
                })
            </script>";
    } else {
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Gagal melakukan pendaftaran',
                    text : 'Silahkan coba beberapa saat lagi',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php'
                })
            </script>";
    }
}



$dataPendaftaran = ambilData("SELECT * FROM tanggal_pendaftaran")[0];
$sekarang = date("Y-m-d");

?>

<!-- contact section -->

<section class="contact_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <h5>
                        Daftar Wali Santri
                    </h5>

                    <form action="" enctype="multipart/form-data" method="post">
                        <div>
                            <label for="namawali" style="color:white;margin-bottom:-5px;">Nama Wali Santri : </label>
                            <input type="text" class="form-control" name="namawali" id="namawali" placeholder="Nama Wali Santri " />
                        </div>
                        <div>
                            <label for="emailwali" style="color:white;margin-bottom:-5px;">Email Wali Santri : </label>
                            <input type="text" class="form-control" name="emailwali" id="emailwali" placeholder="Email Wali Santri " />
                        </div>
                        <div>
                            <label for="nohp" style="color:white;margin-bottom:-5px;">No Hp Wali Santri : </label>
                            <input type="text" class="form-control" name="nohp" id="nohp" placeholder="No Hp Wali Santri " />
                        </div>
                        <div>
                            <label for="password" style="color:white;margin-bottom:-5px;">Password : </label>
                            <input type="password" class="form-control mb-0" name="password" id="password" placeholder="Password " />
                            <span class="status status-warning" style="font-size: small; color: #fff3cd;">*Password perlu diingat/dicatat untuk proses login</span>
                        </div>

                        <div class="mt-2">
                            <label for="nama" style="color:white;margin-bottom:-5px;">Tanggal Lahir Wali : </label>
                            <input type="date" class="form-control" name="tanggalwali" id="tanggalwali" placeholder="Tanggal Lahir " />
                        </div>
                        <div>
                            <label for="tempatlahirwali" style="color:white;margin-bottom:-5px;">Tempat Lahir Wali : </label>
                            <input type="text" class="form-control" name="tempatlahirwali" id="tempatlahirwali" placeholder="Tempat Lahir " />
                        </div>
                        <div>
                            <label for="alamatwali" style="color:white;margin-bottom:-5px;">Alamat Wali Santri : </label>
                            <input type="text" id="alamatwali" name="alamatwali" placeholder="Alamat" class="input_message" />
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" name="submit" class="btn_on-hover">
                                Submit
                            </button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</section>

<!-- end contact section -->



<!-- end info section -->