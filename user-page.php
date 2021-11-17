<?php
require 'functions.php';
session_start();

if (isset($_GET['email'])) {
    $tangkap_email = $_GET['email'];
}

if (!isset($_SESSION['login'])) {
    # code...
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>PPDB ONLINE - SMK NEGERI 1 GENDING</title>
    <?php include 'Templates/link_head.php'; ?>
</head>

<body>
    <!-- Sidenav -->
    <?php $title = 'Dashboard';
    include 'Templates/sidenav.php' ?>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php $title = 'Dashboard';
        include 'Templates/header.php' ?>
        <!-- Header -->
        <!-- Header content -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">

                        </div>
                        <!-- <div class="col-lg-6 col-5 text-right">
                            <a href="#" class="btn btn-sm btn-neutral">New</a>
                            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                        </div> -->
                    </div>
                    <!-- Card stats -->

                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">

            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Petunjuk Pengisian Formulir PPDB Online</h3>

                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <ol>
                                <li>Buka Halaman Input Data Calon Siswa Pada Sidenav</li>
                                <ul>
                                    <li>Isi Data Diri Kamu Pada Formulir Yang Tertera</li>
                                    <li>Jika Ingin Mengubah Data bisa kamu lakukan hal yang serupa</li>
                                </ul>
                                <li>Buka Halaman Input Data Nilai Siswa</li>
                                <ul>
                                    <li>Disana Kamu Harus Menginputkan Nilai UNBK kamu pada surat keterangan lulus dari sekolah</li>
                                    <li>Dan jika kamu salah menginputkan kmu bisa ubah data nilai kamu</li>
                                </ul>
                                <li>Buka Halaman Input Data</li>
                                <ul>
                                    <li>Disana kamu harus menginputkan data diri orang tua kamu</li>
                                </ul>
                                <li>Buka Halaman Pengumuman</li>
                                <ul>
                                    <li>Pada Halaman Pengumuman kamu bisa lihat informasi yang diberikan oleh admin</li>
                                </ul>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <?php include 'Templates/footer.php'; ?>
        </div>
    </div>
    <!-- Argon Scripts -->
    <?php include 'Templates/argon_script.php' ?>
</body>

</html>