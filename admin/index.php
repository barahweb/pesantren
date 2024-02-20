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
                icon: 'info',
                title: 'Santri " . $data[0]['nama'] .  " dinyatakan diterima',
                timer: 1500,
                timerProgressBar: true,
                showConfirmButton: false,
            })
            </script>";
    
            $hasAlertOpened = true;
    
        }
    }

}


$dataPendaftaran = ambilData("SELECT * FROM tanggal_pendaftaran")[0];
$dataDaftar = ambilData("SELECT santri.nama FROM pendaftaran join santri on santri.id_santri = pendaftaran.id_santri join wali_santri on wali_santri.id_wali_santri = santri.id_wali_santri where wali_santri.id_wali_santri = {$idwalisantri}") ;
$dataGagal  = ambilData("SELECT santri.nama FROM pendaftaran join santri on santri.id_santri = pendaftaran.id_santri join wali_santri on wali_santri.id_wali_santri = santri.id_wali_santri where pendaftaran.status = 2 and wali_santri.id_wali_santri = {$idwalisantri} LIMIT 3") ;
$dataHapus  = ambilData("SELECT santri.nama FROM pendaftaran join santri on santri.id_santri = pendaftaran.id_santri join wali_santri on wali_santri.id_wali_santri = santri.id_wali_santri where pendaftaran.status = 10 and wali_santri.id_wali_santri = {$idwalisantri} LIMIT 3") ;
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
                        <i class="far fa-user mt-4"></i>
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
                        <i class="far fa-user mt-4"></i>
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
                        <i class="far fa-user mt-4"></i>
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
                        <i class="far fa-user mt-4"></i>
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
                        <i class="far fa-user mt-4"></i>
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
                        <h4>Pendaftaran Santri Per Tahun</h4>
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
            <h1>Selamat Datang, <?= $user['nama'] ?>!</h1>
        </div>
    </section>

    <?php } ?>
        <section class="section">
            <!-- <div class="section-header">
                <h1>Activities</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Activities</div>
                </div>
            </div> -->
            <?php if($_SESSION['role'] == '2'): ?>
                <div class="container-fluid">
                <div class="">
                    <div class="alert alert-info alert-has-icon">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                            Tanggal pendaftaran dibuka dari tanggal <b><?= tgl_indo($dataPendaftaran['tanggal_mulai'])  . ' - ' . tgl_indo($dataPendaftaran['tanggal_selesai']) ?> </b>
                        </div>
                    </div>
                </div>
                <?php if(COUNT($data) > 0): ?>
                <div class="">
                    <div class="alert alert-success alert-has-icon">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                        Selamat! Pendaftaran Santri <?php foreach($data as $santri): ?> <?=$santri['nama']; ?>, <?php endforeach; ?> Diterima, Mohon Melakukan Pendaftaran Ulang Ke Sekretariat Pondok Pesantren Nurul Iman Dengan membawa Berkas Persyaratan Sebagai Berikut : 
                        <br> - Fotocopy KTP Calon Santri Sebanyak 2 Lembar (Apabila Sudah Punya)
                        <br> - Fotocopy Akte kelahiran sebanyak 2 lembar
                        <br> - Fotocopy KTP orang tua
                        <br> - Fotocopy Kartu Keluarga 
                        <br> - Pass foto 3x4 sebanyak 3 lembar
                        <br> - Surat keterangan tidak mampu (Khusus Dluafa)
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (COUNT($dataDaftar) == 0): ?>
                    <div class="">
                    <div class="alert alert-warning alert-has-icon">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                            Selamat Akun Anda Berhasil Dibuat, Untuk Mendaftarkan Santri baru Silahkan Menuju Ke Menu Pendaftaran Santri atau ikuti langkah pendaftaran santri dibawah ini
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(COUNT($dataGagal) > 0): ?>
                <div class="">
                    <div class="alert alert-danger alert-has-icon">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                            Pendaftaran <?php foreach($dataGagal as $dataGagalSantri): ?> <?=$dataGagalSantri['nama']; ?>, <?php endforeach; ?> ditolak dikarenakan berkas bermasalah, mohon lengkapi berkas kembali untuk melanjutkan pendaftaran
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(COUNT($dataHapus) > 0): ?>
                <div class="">
                    <div class="alert alert-danger alert-has-icon">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                            Mohon maaf, <?php foreach($dataHapus as $dataHapusSantri): ?> <?=$dataHapusSantri['nama']; ?>, <?php endforeach; ?> pendaftaran ditolak karena belum melakukan pembayaran/ada masalah dalam melakukan upload berkas
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-5">Langkah Pendaftaran Santri</h4>

                                <div class="hori-timeline" dir="ltr">
                                    <ul class="list-inline events">
                                        <li class="list-inline-item event-list">
                                            <div class="px-4">
                                                <div class="event-date bg-soft-primary text-primary">1</div>
                                                <h5 class="font-size-16">Pendaftaran</h5>
                                                <p class="text-muted">Ketika pendaftaran santri sudah dibuka, silahkan menuju halaman menu, lalu pilih pendaftaran santri, atau klik button dibawah ini.</p>
                                                <div>
                                                    <a href="index.php?page=walisantri" class="btn btn-primary btn-sm">Pendaftaran Santri</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item event-list">
                                            <div class="px-4">
                                                <div class="event-date bg-soft-success text-success">2</div>
                                                <h5 class="font-size-16">Pengecekan Berkas</h5>
                                                <p class="text-muted">Proses selanjutnya adalah pengecekan berkas oleh pengurus santri, anda dapat mengecek data santri di halaman pendaftaran.</p>
                                                <div>
                                                    <a href="index.php?page=walisantri" class="btn btn-primary btn-sm">Pendaftaran Santri</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item event-list">
                                            <div class="px-4">
                                                <div class="event-date bg-soft-danger text-danger">3</div>
                                                <h5 class="font-size-16">Santri Ditolak</h5>
                                                <p class="text-muted">Jika santri ditolak, wali santri dapat mengubah data santri ataupun upload ulang berkas pada santri yang ditolak pada halaman pendaftaran.</p>
                                                <div>
                                                    <a href="index.php?page=walisantri" class="btn btn-primary btn-sm">Pendaftaran Santri</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item event-list">
                                            <div class="px-4">
                                                <div class="event-date bg-soft-warning text-warning">4</div>
                                                <h5 class="font-size-16">Santri Diterima</h5>
                                                <p class="text-muted">Jika santri diterima, wali dapat menuju halaman pembayaran dan upload bukti pembayaran yang nantinya akan dicek oleh pengurus santri.</p>
                                                <div>
                                                <a href="index.php?page=pembayaran" class="btn btn-primary btn-sm">Pembayaran Santri</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <br>
                                <br>
                                <div class="hori-timeline" dir="ltr">
                                    <ul class="list-inline events">
                                        <li class="list-inline-item event-list">
                                            <div class="px-4">
                                                <div class="event-date bg-soft-primary text-primary">5</div>
                                                <h5 class="font-size-16">Pembayaran</h5>
                                                <p class="text-muted">Ketika santri sudah diterima, maka wali santri dapat melakukan pembayaran dan upload berkas/bukti pada halaman pembayaran</p>
                                                <div>
                                                    <a href="index.php?page=pembayaran" class="btn btn-primary btn-sm">Upload Bukti Pembayaran</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item event-list">
                                            <div class="px-4">
                                                <div class="event-date bg-soft-success text-success">6</div>
                                                <h5 class="font-size-16">Pengecekan Bukti Pembayaran</h5>
                                                <p class="text-muted">Pengurus melakukan pengecekan pembayaran, wali dapat mengecek status pembayaran pada halaman pembayaran </p>
                                                <div>
                                                <a href="index.php?page=pembayaran" class="btn btn-primary btn-sm">Cek Status Pembayaran</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item event-list">
                                            <div class="px-4">
                                                <div class="event-date bg-soft-danger text-danger">7</div>
                                                <h5 class="font-size-16">Pembayaran Berhasil DIproses</h5>
                                                <p class="text-muted">Pihak pesantren telah mengecek dan pembayaran dinyatakan lunas, wali dapat menuju halaman pendaftaran santri</p>
                                                <div>
                                                <a href="index.php?page=walisantri" class="btn btn-primary btn-sm">Cek Status Pembayaran</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <!-- <div class="section-body">
                <h2 class="section-title">September 2018</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="activities">
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-comment-alt"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job text-primary">2 min ago</span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="#">View</a>
                                        <div class="float-right dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-title">Options</div>
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>
                                                    View</a>
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i>
                                                    Detail</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item has-icon text-danger"
                                                    data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                                    data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i>
                                                    Archive</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Have commented on the task of "<a href="#">Responsive design</a>".</p>
                                </div>
                            </div>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-arrows-alt"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job">1 hour ago</span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="#">View</a>
                                        <div class="float-right dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-title">Options</div>
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>
                                                    View</a>
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i>
                                                    Detail</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item has-icon text-danger"
                                                    data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                                    data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i>
                                                    Archive</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Moved the task "<a href="#">Fix some features that are bugs in the master
                                            module</a>" from Progress to Finish.</p>
                                </div>
                            </div>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-unlock"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job">4 hour ago</span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="#">View</a>
                                        <div class="float-right dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-title">Options</div>
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>
                                                    View</a>
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i>
                                                    Detail</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item has-icon text-danger"
                                                    data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                                    data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i>
                                                    Archive</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Login to the system with ujang@maman.com email and location in Bogor.</p>
                                </div>
                            </div>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job">12 hour ago</span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="#">View</a>
                                        <div class="float-right dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-title">Options</div>
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>
                                                    View</a>
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i>
                                                    Detail</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item has-icon text-danger"
                                                    data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                                    data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i>
                                                    Archive</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Log out of the system after 6 hours using the system.</p>
                                </div>
                            </div>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-trash"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job">Yesterday</span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="#">View</a>
                                        <div class="float-right dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-title">Options</div>
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>
                                                    View</a>
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i>
                                                    Detail</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item has-icon text-danger"
                                                    data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                                    data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i>
                                                    Archive</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Removing task "Delete all unwanted selectors in CSS files".</p>
                                </div>
                            </div>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-trash"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job">Yesterday</span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="#">View</a>
                                        <div class="float-right dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-title">Options</div>
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>
                                                    View</a>
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i>
                                                    Detail</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item has-icon text-danger"
                                                    data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                                    data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i>
                                                    Archive</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Assign the task of "<a href="#">Redesigning website header and make it responsive
                                            AF</a>" to <a href="#">Syahdan Ubaidilah</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </section>




</div>


<style>
    body{
    background:#eee;
    margin-top:20px;
}
.hori-timeline .events {
    border-top: 3px solid #e9ecef;
}
.hori-timeline .events .event-list {
    display: block;
    position: relative;
    text-align: center;
    padding-top: 70px;
    margin-right: 0;
}
.hori-timeline .events .event-list:before {
    content: "";
    position: absolute;
    height: 36px;
    border-right: 2px dashed #dee2e6;
    top: 0;
}
.hori-timeline .events .event-list .event-date {
    position: absolute;
    top: 38px;
    left: 0;
    right: 0;
    width: 75px;
    margin: 0 auto;
    border-radius: 4px;
    padding: 2px 4px;
}
@media (min-width: 1140px) {
    .hori-timeline .events .event-list {
        display: inline-block;
        width: 24%;
        padding-top: 45px;
    }
    .hori-timeline .events .event-list .event-date {
        top: -12px;
    }
}
.bg-soft-primary {
    background-color: rgba(64,144,203,.3)!important;
}
.bg-soft-success {
    background-color: rgba(71,189,154,.3)!important;
}
.bg-soft-danger {
    background-color: rgba(231,76,94,.3)!important;
}
.bg-soft-warning {
    background-color: rgba(249,213,112,.3)!important;
}
.card {
    border: none;
    margin-bottom: 24px;
    -webkit-box-shadow: 0 0 13px 0 rgba(236,236,241,.44);
    box-shadow: 0 0 13px 0 rgba(236,236,241,.44);
}

</style>
<?php
    }
    require_once "include/footer.php";
    ?>