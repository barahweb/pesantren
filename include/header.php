<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Ponpes Nurul Iman</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css?<?= date('H:i:s') ?>" rel="stylesheet" />
    <!-- responsive style -->
    <link href="assets/css/responsive.css" rel="stylesheet" />



    <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script src="assets/custom.js"></script>
</head>

<?php $url = $_SERVER['REQUEST_URI']; ?>

<?=$url == '/index.php' ? 'oke' : $url; ?>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                        <h3>
                            NURUL IMAN
                        </h3>
                        <span> ponpes</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item <?=$url == '/index.php' || $url == '/' ? 'active' : ''; ?>">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item  <?=$url != '/index.php' && $url != '/' ? 'active' : ''; ?>">
                                <a class="nav-link" href="index.php?page=daftar"> Daftar Santri </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" target="_blank" href="admin/login.php"> Login Wali Santri </a>
                            </li>


                        </ul>

                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->