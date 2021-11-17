<?php
session_start();
require 'functions.php';
// $no_pendaftaran = $_GET['no_pendaftaran'];
// $calon_siswa = query("SELECT * FROM calon_siswa WHERE no_pendaftaran = '$no_pendaftaran'")[0];
$id_admin = $_GET['id_admin'];
$anggota_admin = query("SELECT * FROM admin WHERE id_admin = '$id_admin'")[0];
if (isset($_POST['edit'])) {
    if (edit_calon_siswa($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');  
                window.location.href='dashboard_admin.php';              
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah, Periksa Data Anda Kembali!!!');                
            </script>
            ";
    }
}
if (isset($_POST['validasi'])) {
    if (validasi_siswa($_POST) > 0) {
        echo "
            <script>
                alert('Siswa Berhasil Di validasi');  
                window.location.href='dashboard_admin.php';              
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah, Periksa Data Anda Kembali!!!');                
            </script>
            ";
    }
}
if (isset($_POST['validate'])) {
    if (validasi_siswa($_POST) > 0) {
        echo "
            <script>
                alert('Siswa Berhasil Di validasi');  
                window.location.href='dashboard_admin.php';              
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah, Periksa Data Anda Kembali!!!');                
            </script>
            ";
    }
}
if (isset($_POST['tentukan_jurusan'])) {
    if (jurusan_terpilih($_POST) > 0) {
        echo "
            <script>
                alert('Jurusan Siswa Berhasil Ditentukan');  
                window.location.href='dashboard_admin.php';              
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal Menentukan Jurusan, Hubungi Developer Segera!!!');                
            </script>
            ";
    }
}
if (isset($_POST['kirim'])) {
    if (tambah_admin($_POST) > 0) {
        echo "
            <script>
                alert('Admin Baru Berhasil Ditambahkan');  
                window.location.href='dashboard_admin.php';              
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal Menentukan Jurusan, Hubungi Developer Segera!!!');                
            </script>
            ";
    }
}
if (isset($_POST['submit'])) {
    if (edit_admin($_POST) > 0) {
        echo "
            <script>
                alert('Data Admin Berhasil Diedit');  
                window.location.href='daftar_admin.php';              
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal mengedit Data Admin, Periksa Program Now!!!');                
            </script>
            ";
    }
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
        <?php include 'Templates/sidenav.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'Templates/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Admin</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->

                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <h6 class="heading-small text-muted mb-4">Admin information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <input type="hidden" name="id_admin" value="<?= $anggota_admin['id_admin']; ?>">
                                        <input type="hidden" value="<?= $anggota_admin['pas_foto']; ?>" name="pas-foto-lama">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nama-calon-admin">Nama Calon Admin</label>
                                                <input type="text" id="input-nama-calon-admin" class="form-control" placeholder="Type Here" value="<?= $anggota_admin['fullname']; ?>" name="nama-calon-admin">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email</label>
                                                <input type="email" id="input-email" class="form-control" placeholder="Type Here" name="email" value="<?= $anggota_admin['email']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-pas-foto">Pas Foto 4 x 6</label>
                                                <br>
                                                <img src="../img/<?= $anggota_admin['pas_foto']; ?>" alt="" width="100px">
                                                <input type="file" id="input-pas-foto" class="form-control" placeholder="Type Here" name="pas-foto" value="<?= $anggota_admin['password']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group" style="margin-top: 117px;">
                                                <label class="form-control-label" for="input-tempat-lahir">Password</label>
                                                <input type="text" id="input-tempat-lahir" class="form-control" data-toggle="password" placeholder="Type Here" name="password" value="<?= $anggota_admin['password']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <hr class="my-4" /> -->
                                <!-- Address -->
                                <!-- <h6 class="heading-small text-muted mb-4">Contact information</h6> -->
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <!-- <button type="submit" name="submit" class="btn btn-sm btn-primary mr-1">Kirim</button> -->
                                            <button type="submit" name="submit" class="btn btn-sm btn-success mr-1">Kirim Data</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                        <span>Copyright &copy; Your Website 2021</span>
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


    <!-- Modal validate -->
    <div class="modal fade" id="modal_validate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Validasi Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="detail_pendaftar.php?no_pendaftaran=<?= $no_pendaftaran; ?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="no_pendaftaran" value="<?= $no_pendaftaran; ?>">
                            <label for="beri_penilaian">Beri Penilaian</label>
                            <select class="form-control" id="beri_penilaian" name="validate_now">
                                <option value="<?= $calon_siswa['status']; ?>"><?= $calon_siswa['status']; ?></option>
                                <option value="LOLOS">LOLOS</option>
                                <option value="TIDAK DITERIMA">TIDAK DITERIMA</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="validate" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal tentukan jurusan -->
    <div class="modal fade" id="modal_tentukan_jurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tentukan Jurusan Now!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="detail_pendaftar.php?no_pendaftaran=<?= $no_pendaftaran; ?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="no_pendaftaran" value="<?= $no_pendaftaran; ?>">
                            <label for="beri_penilaian">Tentukan Jurusan</label>
                            <select class="form-control" id="beri_penilaian" name="jurusan_terpilih">
                                <option value="<?= $calon_siswa['jurusan_terpilih']; ?>"><?= $calon_siswa['jurusan_terpilih']; ?></option>
                                <option value="<?= $calon_siswa['jurusan_satu']; ?>"><?= $calon_siswa['jurusan_satu']; ?></option>
                                <option value="<?= $calon_siswa['jurusan_dua']; ?>"><?= $calon_siswa['jurusan_dua']; ?></option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="tentukan_jurusan" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

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