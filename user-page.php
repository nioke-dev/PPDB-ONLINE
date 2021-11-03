<?php
require 'functions.php';
session_start();

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
    <?php include 'Templates/sidenav.php' ?>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php include 'Templates/header.php' ?>
        <!-- Header -->
        <!-- Header content -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">

                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="#" class="btn btn-sm btn-neutral">New</a>
                            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                        </div>
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
                            <ul>
                                <li>1. Buka Halaman</li>
                                <li>1. Buka Halaman</li>
                                <li>1. Buka Halaman</li>
                                <li>1. Buka Halaman</li>
                                <li>1. Buka Halaman</li>
                                <li>1. Buka Halaman</li>
                                <li>1. Buka Halaman</li>
                                <li>1. Buka Halaman</li>
                                <li>1. Buka Halaman</li>
                            </ul>
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