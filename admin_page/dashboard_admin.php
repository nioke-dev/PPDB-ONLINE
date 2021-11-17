<?php
session_start();
require 'functions.php';

$email_admin = $_SESSION['email'];
$id_user_yang_login = query("SELECT * FROM admin WHERE email = '$email_admin'")[0];
$id_admin = $id_user_yang_login['id_admin'];
$name_admin = $id_user_yang_login['fullname'];


$data_perempuan = query("SELECT COUNT(jenis_kelamin) FROM calon_siswa WHERE jenis_kelamin = 'perempuan'")[0];
$data_laki = query("SELECT COUNT(jenis_kelamin) FROM calon_siswa WHERE jenis_kelamin = 'laki-laki'")[0];
$data_keseluruhan = query("SELECT COUNT(jenis_kelamin) FROM calon_siswa")[0];

$data_calon_siswa = query("SELECT * FROM calon_siswa");


// penghitungan rata rata nilai un siswa

if (isset($_POST['cari'])) {
    $data_calon_siswa = cari($_POST['keyword']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $title = 'dashboard';
        include 'Templates/sidenav.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $title = 'active';
                include 'Templates/topbar_plus_search.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="export_data.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Cetak Data Pendaftar</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Pendaftar</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_keseluruhan['COUNT(jenis_kelamin)']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-database fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Laki - Laki</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_laki['COUNT(jenis_kelamin)']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-mars fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Perempuan
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_perempuan['COUNT(jenis_kelamin)']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-venus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jurusan</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data_calon_siswa as $dcs) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $dcs['nama_calon_siswa']; ?></td>
                                                <td><?= $dcs['jurusan_terpilih']; ?></td>
                                                <td><?= $dcs['status']; ?></td>
                                                <td>
                                                    <a href="detail_pendaftar.php?no_pendaftaran=<?= $dcs['no_pendaftaran']; ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="See Details"><i class="fas fa-info-circle"></i></a>
                                                    <a href="hapus_siswa.php?no_pendaftaran=<?= $dcs['no_pendaftaran']; ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Hapus Siswa"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PPDB ONLINE 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>