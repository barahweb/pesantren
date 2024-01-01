<?php
if (!isset($_SESSION['login'])) {
    header('Location:login.php');
}

if ($_SESSION['role'] == 1) {
    $user = ambilData("SELECT * FROM pengurus WHERE id_pengurus = {$_SESSION['user']}")[0];
    $nama = $user['nama'];
}

if ($_SESSION['role'] == 2) {
    $user           = ambilData("SELECT * FROM wali_santri WHERE id_wali_santri = {$_SESSION['user']}")[0];
    $idwalisantri   = $_SESSION['user'] ?? NULL;
    $nama           = $user['nama'] ?? NULL;
}

$role = $_SESSION['role'];
if (isset($idwalisantri)) {

    $data = ambilData("SELECT santri.nama, pendaftaran.status FROM pendaftaran join santri on santri.id_santri = pendaftaran.id_santri join wali_santri on wali_santri.id_wali_santri = santri.id_wali_santri and wali_santri.id_wali_santri = {$idwalisantri}") ;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Ponpes Nurul Iman</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css" />
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-N5RWs9dpjqDBr2LH">
    </script>
    <!-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-8HFNO3nOXNAwFSke"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>


    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js?<?= date("H:i:s") ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Page Specific JS File -->
    <!-- <script src="assets/js/page/index.js"></script> -->





    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>




</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>

                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg <?php if (COUNT($data) > 0): echo 'beep'; ?>  <?php endif; ?>"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <?php foreach ($data as $santri): ?>
                                    <a href="index.php?page=walisantri" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fas fa-user mt-2 py-1"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Santri <?=$santri['nama']; ?> 
                                        <?php if ($santri['status'] == 2): echo 'dinyatakan gagal!'; ?>
                                        <?php elseif ($santri['status'] == 1): echo 'dinyatakan diterima!'; ?>
                                        <?php endif; ?>
                                    </div>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= $nama ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <?php if ($_SESSION['role'] == 2) { ?>
                            <a href="index.php?page=profil" class="dropdown-item has-icon text-primary">
                                <i class="fas fa-user"></i> Profil
                            </a>
                            <?php } ?>
                            <a href="logout.php" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout

                            </a>

                        </div>
                    </li>
                </ul>
            </nav>