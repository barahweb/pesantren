<style>
    .colored-toast.swal2-icon-success {
        background-color: #a5dc86 !important;
    }

    .colored-toast.swal2-icon-error {
        background-color: #f27474 !important;
    }

    .colored-toast.swal2-icon-warning {
        background-color: #f8bb86 !important;
    }

    .colored-toast.swal2-icon-info {
        background-color: #3fc3ee !important;
    }

    .colored-toast.swal2-icon-question {
        background-color: #87adbd !important;
    }

    .colored-toast .swal2-title {
        color: white;
    }

    .colored-toast .swal2-close {
        color: white;
    }

    .colored-toast .swal2-html-container {
        color: white;
    }
</style>
<?php
require('../vendor/autoload.php');

use Rakit\Validation\Validator;

$validator  = new Validator;




require_once "include/function.php";
require_once "include/header.php";
require_once "include/sidebar.php";



if (isset($_GET['page'])) {
    $page = $_GET['page'];


    $hakAkses =  hakAkses($role, $page);



    if ($hakAkses) {
        switch ($page) {
            case "pengurus":
                require_once "pengurus/index.php";
                break;
            case "tambahpengurus":
                require_once "pengurus/tambahpengurus.php";
                break;
            case "tanggalpendaftaran":
                require_once "pendaftaran/tanggal.php";
                break;
            case "santridaftar":
                require_once "santridaftar/index.php";
                break;
            case "santriditerima":
                require_once "santriditerima/index.php";
                break;
            case "walisantripengurus":
                require_once "walisantripengurus/index.php";
                break;

            case "walisantri":
                require_once "walisantri/index.php";
                break;
            case "tambahsantri":
                require_once "walisantri/tambahsantri.php";
                break;
            case "pembayaran":
                require_once "pembayaran/index.php";
                break;
            case "laporankeuangan":
                require_once "laporan/laporankeuangan.php";
                break;
            case "laporansantri":
                require_once "laporan/laporansantri.php";
                break;
            case "laporanpendaftaran":
                require_once "laporan/laporanpendaftaran.php";
                break;
            case "profil":
                require_once "user/profil.php";
                break;
            default:
                require_once "index.php";
                break;
        }
    } else {
        echo "<script>document.location.href='index.php'</script>";
    }
} else {


    ?>
<?php 
$hasAlertOpened = false;
$idwalisantri = $_SESSION["user"] ?? NULL;
if ($hasAlertOpened == false) {
    if ($idwalisantri) {
        
        $data = ambilData("SELECT santri.nama FROM pendaftaran join santri on santri.id_santri = pendaftaran.id_santri join wali_santri on wali_santri.id_wali_santri = santri.id_wali_santri where pendaftaran.status = 1 and wali_santri.id_wali_santri = {$idwalisantri} LIMIT 3") ;
        if ($data) {
            echo "<script>
            Swal.fire({
                toast: true,
                position: 'top-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast'
                },
                icon: 'success',
                title: 'Santri " . $data[0]['nama'] .  " dinyatakan diterima',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
            })
            </script>";
    
            $hasAlertOpened = true;
    
        }
    }

}


?>
    
        <!-- Main Content -->
        <div class="main-content">


            <?php if ($_SESSION['role'] == 1) { ?>
                <section class="section">
                    <div class="section-header">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Pengurus</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                                $jumlah = ambilData("SELECT COUNT(id_pengurus) AS jumlah FROM pengurus")[0]['jumlah'];
                                                ?>

                                        <?= $jumlah ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Santri Ditolak</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php $jumlah = ambilData("SELECT COUNT(id_santri) as jumlah from pendaftaran where status = 2")[0]['jumlah']; ?>
                                        <?= $jumlah ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Santri Diterima</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php $jumlah = ambilData("SELECT COUNT(id_santri) as jumlah from pendaftaran where status = 1")[0]['jumlah']; ?>
                                        <?= $jumlah ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Santri Mendaftar</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php $jumlah = ambilData("SELECT COUNT(id_santri) AS jumlah FROM santri")[0]['jumlah']; ?>
                                        <?= $jumlah ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Wali Santri</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php $jumlah = ambilData("SELECT COUNT(id_wali_santri) AS jumlah FROM wali_santri")[0]['jumlah']; ?>
                                        <?= $jumlah ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Grafik Keungan Per Tahun</h4>
                                    <div class="card-header-action">
                                        <div class="btn-group">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>



            <?php } else { ?>
                <section class="section">
                    <div class="section-header">
                        <h1>Selamat Datang</h1>
                    </div>
                </section>

            <?php } ?>





        </div>
    <?php
    }
    require_once "include/footer.php";
    ?>
    