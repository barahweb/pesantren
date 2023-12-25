<?php

require('vendor/autoload.php');

use Rakit\Validation\Validator;

$validator  = new Validator;
require_once "admin/include/function.php";
require_once "include/header.php";


if (isset($_GET["page"])) {
    $page = $_GET['page'];

    switch ($page) {
        case "daftar":
            require_once "daftar.php";
            break;
    }
} else {


    ?>

        <!-- slider section -->
        <section class=" slider_section position-relative">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <!-- <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol> -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="detail-box">
                                        <div>
                                            <!-- <h1 style="color: darkolivegreen;">
                                                P E S A N T R E N
                                            </h1> -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="carousel-item ">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="detail-box">
                                        <div>
                                            <h1>
                                                E D U C A T I O N
                                            </h1>
                                            <a href="">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="detail-box">
                                        <div>
                                            <h1>
                                                E D U C A T I O N
                                            </h1>
                                            <a href="">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- end slider section -->
        </div>

        <!-- special section -->

        <section class="special_section">
            <div class="container">
                <div class="special_container">
                    <div class="box b1">
                        <div class="img-box">
                            <img src="assets/images/award.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                BERKUALITAS <br />
                                BAGUS
                            </h4>

                        </div>
                    </div>
                    <div class="box b2">
                        <div class="img-box">
                            <img src="assets/images/study.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                BELAJAR <br />
                                BELAJAR MUDAH
                            </h4>

                        </div>
                    </div>
                    <div class="box b3">
                        <div class="img-box">
                            <img src="assets/images/books-stack-of-three.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                PERPUSTAKAAN <br />
                                LENGKAP
                            </h4>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end special section -->

        <!-- about section -->
        <section class="about_section layout_padding">
            <div class="side_img">
                <img src="assets/images/side-img.png" alt="" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img_container">
                            <div class="img-box b1">
                                <img src="assets/DSC08853.JPG" alt="" />
                            </div>
                            <div class="img-box b2">
                                <img src="assets/DSC08946.JPG" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h3>
                                    Tentang Pesantren Ponpes Nurul Iman
                                </h3>
                                <p>
                                    Nurul Iman berdiri pada 19 Juni 1998. Aktor hebatnya adalah pasangan suami-istri almarhum Habib Saggaf dan Waheeda. Kedua sosok ini kemudian akrab dipanggil dengan sebutan Abah dan Umi Waheeda.

                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end about section -->

        <!-- course section -->

        <section class="course_section layout_padding-bottom">
            <div class="side_img">
                <img src="assets/images/side-img.png" alt="" />
            </div>
            <div class="container">
                <div class="heading_container">
                    <h3>
                        ILMU YANG DIPELAJARI
                    </h3>
                    <p>
                        <!-- It is a long established fact that a reader will be distracted -->
                    </p>
                </div>
                <div class="course_container">
                    <div class="course_content">
                        <div class="box">
                            <img src="assets/mengaji3.JPG" alt="" />

                            <h5>
                                Mengaji <br />

                            </h5>
                        </div>
                        <div class="box">
                            <img src="assets/mengaji2.JPG" alt="" />

                            <h5>
                                Hafalan <br />
                                Al-Quran
                            </h5>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- end course section -->

        <!-- login section -->







        <!-- end info section -->
    <?php
    }
    require_once "include/footer.php";
    ?>